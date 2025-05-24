Here’s a professional and structured `README.md` version of your system specification:

---

# Service Reservation System

This document outlines the requirements, assumptions, data models, and API endpoints for a basic service reservation system.

---

## Requirements

* Users can reserve services at specific times and dates.
* Services have defined availability windows and durations.
* A service cannot be double-booked at the same time.
* System should return available time slots based on service availability and existing reservations.

---

## Suggested Features (Future Enhancements)

* Add support for categorizing services.
* Implement search functionality for easier service discovery.

---

## Assumptions

* Each service is available **every day** between a defined `available_from` and `available_to`.
* A service can be reserved **once at a given time** (i.e., no overlapping reservations).
* Each service has a fixed `duration` in minutes.
* Optionally, services may define a `cancellation_cutoff_hours` indicating how long before the reservation a user can cancel.

---

## User Flow

### Example Scenario

**User wants to reserve Service A tomorrow at 10:00 AM:**

* The selected time (10:00 AM) is within the service's availability window.
* No other reservation exists at that time for the same service.

### Reservation Flow (User Perspective)

1. Select a service.
2. Choose a date.
3. View available time slots for that date.
4. Select a time slot and confirm the reservation.

---

## How Available Times Are Calculated (System Perspective)

1. Fetch `available_from`, `available_to`, and `duration` for the service.
2. Generate time slots between `available_from` and `available_to` based on the duration.
3. Fetch existing reservations for that service on the selected date.
4. Filter out the reserved time slots from the generated list.

#### Example:

* Service: Consultation
* Availability: 10:00–18:00
* Duration: 1 hour
* Existing reservations: 10:00–11:00 and 13:00–14:00

**Available times returned:**
`11:00, 12:00, 14:00, 15:00, 16:00, 17:00`

---

## Database Schema

### `services` Table

| Column                      | Type    | Description                                            |
| --------------------------- | ------- | ------------------------------------------------------ |
| id                          | UUID    | Primary key                                            |
| name                        | String  | Name of the service                                    |
| duration                    | Integer | Duration in minutes                                    |
| available\_from             | Time    | Daily start time of availability                       |
| available\_to               | Time    | Daily end time of availability                         |
| cancellation\_cutoff\_hours | Integer | (Optional) Hours before reservation required to cancel |

---

### `reservations` Table

| Column      | Type     | Description                             |
| ----------- | -------- | --------------------------------------- |
| id          | UUID     | Primary key                             |
| service\_id | UUID     | FK to `services.id`                     |
| user\_id    | UUID     | ID of the user who made the reservation |
| date\_from  | Datetime | Reservation start datetime              |
| date\_to    | Datetime | Reservation end datetime (calculated)   |

---

## API Endpoints

### Services

* `GET /services`
  Returns a list of all services.

* `GET /services/:id`
  Returns details of a specific service.

* `GET /services/:id/availability?date=YYYY-MM-DD`
  Returns a list of available time slots for a service on a given date.
  Example response:
  `["10:00", "11:00", "12:00", "13:00", "14:00", "15:00"]`

---

### Reservations

* `POST /reservations`
  Creates a new reservation after validating availability.
  **Payload:**

  ```json
  {
    "service_id": "uuid",
    "datetime": "YYYY-MM-DDTHH:mm"
  }
  ```

* `GET /reservations?mode=past|future`
  Returns a list of user's reservations (past or upcoming).

* `POST /reservations/:id/cancel`
  Attempts to cancel a reservation if it's before the cutoff time.
  Logic:

  ```text
  if (reservation_time - current_time > cancellation_cutoff_hours)
    => allow cancel
  else
    => deny cancel
  ```

---

Let me know if you'd like this in a specific format like `.md` file or with additions like authentication, admin flows, or diagrams.
