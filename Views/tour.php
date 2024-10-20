<?php
session_start();
if (!empty(($_GET['id']))) {
        $_SESSION['tour'] +=1;
        $_SESSION['cardSelected'] =  $_GET['id'];
        array_push($_SESSION['cardPlayed'] , $_SESSION['cardSelected']);
        if (count($_SESSION['cardPlayed']) == 2) {
            if ( intval($_SESSION['cardPlayed'][0]) == intval($_SESSION['cardPlayed'][1])) {
                $_SESSION['cardPlayed'] = [];
                $_SESSION['pairFind'] +=1;
                array_push($_SESSION['cardsFound'], intval($_SESSION['cardSelected']));
            } else {
                $_SESSION['cardPlayed'][0] = $_SESSION['cardSelected'];
                array_pop( $_SESSION['cardPlayed']);
            }
        }
        header("Location: game.php");



}
