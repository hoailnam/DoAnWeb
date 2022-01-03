<?php

function chuyenUSD2VND($value)
{
    return number_format($value * 22000, 0, ",", ".") . " VNĐ";
}

