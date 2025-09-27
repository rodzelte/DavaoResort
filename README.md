# Full-Stack Project

![Build](https://img.shields.io/badge/build-passing-brightgreen)  
![PHP](https://img.shields.io/badge/PHP-8.2-blue?logo=php)  
![MariaDB](https://img.shields.io/badge/MariaDB-10.4-blue?logo=mariadb)  
![React](https://img.shields.io/badge/React-19.1-61DAFB?logo=react)  
![Vite](https://img.shields.io/badge/Vite-7.1-purple?logo=vite)  
![TailwindCSS](https://img.shields.io/badge/TailwindCSS-4.1-38B2AC?logo=tailwind-css)  
![License](https://img.shields.io/badge/License-MIT-yellow.svg)  

A modern full-stack web application built with a **PHP backend** and a **React + Vite frontend**. Styled with TailwindCSS and powered by MariaDB for data persistence.

---

## 🚀 Tech Stack

### Backend
- **PHP**: 8.2.12  
- **MariaDB (SQL)**: 10.4.32  

### Frontend
- **React**: ^19.1.1  
- **React Router DOM**: ^7.9.2  
- **Vite**: ^7.1.7  
- **TailwindCSS**: ^4.1.13  

### Development Tools
- **ESLint** with React & Refresh plugins  
- **TypeScript types for React**

---

## 📂 Project Structure

project-root/
│── backend/ # PHP backend (API, database connection, controllers)
│── frontend/ # React + Vite frontend
│ ├── public/ # Static assets
│ ├── src/ # React components, routes, styles
│ └── package.json
│── README.md



---

## ⚙️ Installation & Setup

### Prerequisites
Make sure you have installed:
- [PHP 8.2+](https://www.php.net/downloads)
- [MariaDB 10.4+](https://mariadb.org/download/)
- [Node.js (LTS)](https://nodejs.org/) + npm

---

### Backend Setup
```bash
# Navigate to backend folder
cd backend

# Start PHP server (example: localhost:8000)
php -S localhost:8000


# Navigate to frontend folder
cd frontend

# Install dependencies
npm install

# Start development server
npm run dev

# Build for production
npm run build

# Preview production build
npm run preview
