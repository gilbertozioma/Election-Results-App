# Election Results Application

This Laravel application provides a platform for managing and viewing election results. It allows users to:

*   View individual polling unit results.
*   Display summed results for a selected LGA (Local Government Area).
*   Enter results for new polling units.

## Prerequisites

*   PHP 8.2 or higher
*   Composer (https://getcomposer.org/)
*   SQL Server (or your preferred database)

## Installation

1.  **Clone the Repository:**

    ```bash
    git clone https://github.com/gilbertozioma/Election-Results-App.git
    cd election-results-app
    ```

2.  **Install Dependencies:**

    ```bash
    composer install
    npm install
    ```

3.  **Create Environment File:**

    ```bash
    cp .env.example .env
    ```

4.  **Configure Environment Variables:**

    *   Open the `.env` file and set your database credentials (`DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`).
    *   Customize other variables as needed (e.g., `APP_NAME`, `APP_URL`).

5.  **Generate Application Key:**

    ```bash
    php artisan key:generate
    ```

6.  **Run Migrations and Seeders (Optional):**

    *   If you have database migrations and seeders, run them to set up the database schema and initial data:
        ```bash
        php artisan migrate --seed
        ```


## Usage

1.  **Start Development Server:**

    ```bash
    php artisan serve
    ```

2.  **Access the Application:**

    Open your browser and visit `http://localhost:8000` (or the URL specified in your `.env` file).

## Features

*   **Individual Polling Unit Results:** View detailed results for any polling unit.
*   **LGA Summed Results:** Select an LGA and see the summed total results for all parties.
*   **New Results Entry:** Easily input results for new polling units.

## Important Notes

*   **PHP 8.2 Compatibility:** This project is designed to work with PHP 8.2. If you're using an older version, you might need to make adjustments to the code.
*   **Database Configuration:** Make sure your database connection is correctly configured in the `.env` file.

### Thanks for viewing. 🙂
