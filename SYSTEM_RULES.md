# ScholarHub System Rules

---

# User Roles

- STUDENT
- MENTOR
- ADMIN

---

# Scholarship Status

- OPEN
- CLOSED
- COMING_SOON

---

# Mentor Schedule Status

- AVAILABLE
- BOOKED
- COMPLETED

---

# Mentor Booking Status

- PENDING
- PAID
- COMPLETED
- CANCELLED

---

# Payment Status

- PAID
- FAILED

---

# Notification Status

- PENDING
- SENT
- FAILED

---

# Booking Rules

- 1 slot hanya untuk 1 mahasiswa
- Booking dapat dibatalkan mahasiswa
- Cancel booking mengubah schedule menjadi AVAILABLE

---

# Assessment Rules

- Assessment berdasarkan scholarship
- Setiap scholarship memiliki pertanyaan berbeda
- Mahasiswa dapat melakukan assessment berkali-kali

---

# Review Rules

- 1 booking hanya dapat memiliki 1 review
- Review tidak dapat diedit

---

# File Storage Rules

- File menggunakan Laravel local storage
- Database hanya menyimpan file_path