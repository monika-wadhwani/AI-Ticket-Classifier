# AI-Powered Support Ticket Classifier

An automated support ticket system built with Laravel that uses AI to instantly categorize and prioritize incoming tickets — no manual sorting required.

🔗 **Live Demo:** [your-railway-url-here](https://ai-ticket-classifier-production-4e8a.up.railway.app)
📂 **Repository:** [github.com/monika-wadhwani/AI-Ticket-Classifier](https://github.com/monika-wadhwani/AI-Ticket-Classifier)

---

## Overview

Support teams often spend significant time manually reading through tickets to figure out what they're about and how urgent they are. This project automates that step entirely.

When a ticket is submitted, it's automatically:
- **Categorized** — billing, technical, or general
- **Prioritized** — low, medium, or high

Classification runs in the background via a queued job, so ticket submission stays instant for the user — even though the AI call itself takes a few seconds.

---

## Tech Stack

- **Backend:** Laravel 11 (PHP)
- **AI:** OpenAI API (gpt-4o-mini)
- **Database:** MySQL
- **Queue:** Laravel Queues (database driver)
- **Frontend:** Blade + Tailwind CSS
- **Deployment:** Railway

---

## How It Works

1. User submits a ticket (subject + description) through a simple form
2. Ticket is saved to the database immediately, and the user sees an instant success message
3. A `ClassifyTicket` job is dispatched to the queue
4. A separate queue worker process picks up the job, sends the ticket content to OpenAI, and receives back a structured classification
5. The ticket record is updated with the AI-generated category and priority
6. The tickets list shows live status — "Pending..." while classification is in progress, then the actual category/priority once complete

This background-job pattern keeps the app responsive regardless of AI response time, and mirrors how classification would run in a real production support tool.

---

## Key Technical Decisions

- **Service class architecture** — AI API logic is isolated in `AIClassifierService`, keeping the OpenAI integration swappable and separate from business logic
- **Queued jobs over synchronous calls** — classification never blocks the user-facing request/response cycle
- **Separate worker service in production** — the queue worker runs as its own always-on process, independent from the web server, matching real-world deployment patterns (e.g., Supervisor-managed workers)

---

## Running Locally

```bash
git clone https://github.com/monika-wadhwani/AI-Ticket-Classifier.git
cd AI-Ticket-Classifier
composer install
cp .env.example .env
php artisan key:generate
```

Add your OpenAI API key and database credentials to `.env`:
```
OPENAI_API_KEY=your-key-here
DB_CONNECTION=mysql
DB_DATABASE=your-db-name
DB_USERNAME=your-username
DB_PASSWORD=your-password
QUEUE_CONNECTION=database
```

Run migrations and start the app:
```bash
php artisan migrate
php artisan serve
```

In a separate terminal, start the queue worker (required for classification to run):
```bash
php artisan queue:work
```

Visit `http://localhost:8000/tickets/create` to submit a test ticket.

---

## Screenshots

*(Add a screenshot of the ticket form and the tickets list with classified results here)*

---

## What's Next

- User authentication for multi-tenant ticket management
- Email notifications when high-priority tickets are created
- Dashboard with ticket volume/category analytics