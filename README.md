# Task Manager App

![App Preview](app-preview.png)

A simple yet powerful task management app built with Laravel and Breeze. This app helps users organize, manage, and track their tasks efficiently. It includes features like user authentication, task creation, editing, and deletion, along with priority levels and deadlines.

## Features

- **User Authentication**: Sign up, log in, and manage your account.
- **Task Management**: Create, edit, delete, and view tasks.
- **Task Priority**: Assign priority levels (low, medium, high) to tasks.
- **Task Deadlines**: Set deadlines for tasks and visually track overdue tasks.
- **Task Filtering**: Filter tasks by status and category.
- **Task Search**: Search for tasks by title or description.
- **Task Comments**: Add, edit, and delete comments on tasks.

## Installation

To get started with the project, follow these steps:

### 1. Clone the repository:

```bash
git clone https://github.com/yourusername/task-manager-app.git
```

### 2. Navigate to the project folder:
```bash
cd task-manager-app
```

### 3. Install dependencies:

```bash
composer install
npm install
```

### 4. Set up the environment variables:
Copy the `.env.example` file to create a new `.env` file:

Then, generate the application key:

```bash
php artisan key:generate
```

### 5. Set up the database:
Run the migrations to set up the database tables:

```bash
php artisan migrate
```

### 6. Run the app:
You can now run the app locally:

```bash
php artisan serve
```

The application will be accessible at `http://localhost:8000`.

## Usage
1- **Sign Up**: Create a new account or log in using your credentials.
2- **Create Tasks**: Add tasks with titles, descriptions, deadlines, and priorities.
3- **Manage Tasks**: Edit or delete tasks you own.
4- **Track Progress**: Mark tasks as completed and track their status and deadlines.
5- **Search & Filter**: Use the search bar and filters to quickly find tasks by title, description, status, or category.

## Technologies Used
- **Backend**: Laravel
- **Frontend**: Blade, Tailwind CSS
- **Authentication**: Laravel Breeze
- **Database**: MySQL (or your preferred database)
- **Version Control**: Git
  
## Contributing
Contributions are welcome! Feel free to fork the project, make changes, and create pull requests.

## To contribute:

- Fork the repository.
- Create a new branch for your feature or fix.
- Make the necessary changes.
- Open a pull request with a description of the changes.

## License
This project is licensed under the MIT License - see the LICENSE file for details.

## Acknowledgements
- Laravel for the powerful framework.
- Tailwind CSS for flexible and responsive UI design.
- Laravel Breeze for simple and easy authentication setup.
- Contributors and open-source community for valuable resources and inspiration.