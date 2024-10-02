<?php

class Bracked {
    public static function htmlBrackeg_1070() {
        echo '<div class="my-2 fw-bold d-flex">
            <a href="'.BASEURL.'" class="text-secondary text-decoration-none text-success"><h2 class="h6 fw-bold m-0">Log In</h2></a> <span class="mx-2">|</span>               <a href="'.BASEURL.'s/create/200" class="text-secondary text-decoration-none"><h2 class="h6 fw-bold m-0">Sign Up</h2></a>
        </div>';
    }
    public static function htmlBrackeg_1072() {
        echo '<div class="my-2 fw-bold d-flex">
            <a href="'.BASEURL.'" class="text-secondary text-decoration-none"><h2 class="h6 fw-bold m-0">Log In</h2></a> <span class="mx-2">|</span>               <a href="'.BASEURL.'s/create/200" class="text-success text-decoration-none"><h2 class="h6 fw-bold m-0">Sign Up</h2></a>
        </div>';
    }
    public static function htmlBrackVery_102() {
        echo '<div class="mt-2 text-white">
            Forgot Password? <a href="'.BASEURL.'s/forgot" class="text-success">Here!</a>
        </div>';
    }
    public static function showNav_tasks(){
        echo '<a href="'.BASEURL.'tasks" class="text-warning text-decoration-none"><h2 class="h6 fw-bold m-0">Task</h2></a> <span class="mx-2">|</span>
            <a href="'.BASEURL.'wallets" class="text-secondary text-decoration-none text-secondary"><h2 class="h6 fw-bold m-0">Wallet</h2></a> 
        ';
    }
    public static function showNav_wallets(){
        echo '<a href="'.BASEURL.'tasks" class="text-secondary text-decoration-none"><h2 class="h6 fw-bold m-0">Task</h2></a> <span class="mx-2">|</span>
            <a href="'.BASEURL.'wallets" class="text-secondary text-decoration-none text-warning"><h2 class="h6 fw-bold m-0">Wallet</h2></a><span class="mx-2">|</span><a href="'.BASEURL.'p/logout" class="text-secondary text-decoration-none text-secondary"><h2 class="h6 fw-bold m-0">Log Out</h2></a>
        ';
    }
    public static function footer(){
        echo '<footer class="px-4 py-4 text-white">
            <a href="https://buzzkuy.blogspot.com" class="text-secondary mx-1"><i class="fa fa-blog"></i></a>
            <a href="https://www.instagram.com/yunmecoins_buzz" class="text-secondary mx-1"><i class="fab fa-instagram"></i></a>
            © 2024 - 2025. Yunmecoins
        </footer>';
    }
}