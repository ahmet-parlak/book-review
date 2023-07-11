<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Project

This repository contains the code for a web application that allows users to rate and review books, as well as create and share their own book lists with other users. The application provides a platform for book enthusiasts to engage with each other, discover new books, and share their thoughts and recommendations.

## Features
- **User Registration and Authentication:** Users can create accounts and log in to the application using their credentials. This ensures that only registered users can rate books, write reviews, and create book lists.
- **Book Database:** The application includes a comprehensive database of books, including their titles, authors, genres, and cover images.
- **Search and Discovery:** The application includes a search functionality that allows users to find specific books by isbn, title, author, or publisher. 
- **Book Rating and Review:** Users can rate books on a scale and provide detailed reviews sharing their opinions and insights. This feedback helps other users make informed decisions about which books to read.
- **Book Lists:**  Users have the option to create personal book lists, such as "Favorite Science Fiction Novels" or "Must-Read Classics." They can add books from the database to their lists and customize them according to their preferences.
- **Public and Private Lists:** Users can choose whether to make their book lists public or private. Public lists are visible to other users, allowing for sharing and discovery, while private lists remain visible only to the creator.
- **Error/Incomplete Book Reporting System:** Users can report books that contain errors or incomplete information. This feature allows users to notify the system administrators about any issues they encounter with book details, such as incorrect author names, missing genres, or inaccurate descriptions.
- **Book Request Form for Adding Missing Books:** Users can request the addition of books that are not currently present in the system.
- **Simple Administrator Panel:** The web application includes a basic administrator panel that allows administrators to manage books in the system. They can add new books, edit existing book details, review error reports submitted by users, and handle book requests. 

## Technologies
- **Front-end:** HTML, CSS, JavaScript, jQuery, Bootstrap, Tailwind CSS. The interface is designed using a customized template from HTMLCodex. The administration panel is built using Tailwind CSS, a utility-first CSS framework.
- **Back-end:** Laravel
- **API Development**: The API for the mobile application is developed using the Laravel framework. It handles authentication, data retrieval, and other necessary endpoints to facilitate seamless communication between the mobile app and the web application.
- **Database:** MySQL
- **Additional Tools:** Laravel Jetstream, Font Awesome, SweetAlert2, Intervention Image

## Mobile Application

A mobile application companion to this web application is also available.

You can find the mobile application's source code and documentation in the following repository:

[Mobile Application Repository](https://github.com/ahmet-parlak/book-review-flutter)

## Preview

<div align="center">
<img src="project.gif" width="auto" width="300" height="300">
</div>

