<?php


function prvd_concat_handler($param1, $param2) {
    $result = $param1.$param2;

    if (prvd_xcheck($param1) || prvd_xcheck($param2)) {
        prvd_xmark($result);
    }

    return $result;
}


if (PRVD_TAINT_ENABLE)
    xregister_opcode_callback(XMARK_CONCAT, 'prvd_concat_handler');
