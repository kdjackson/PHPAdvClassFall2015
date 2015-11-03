<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author 001348911
 */
interface irestmodel {
    //put your code here
    function getAll();
    function get($id);
    function post();
    function put();
    function delete();
}