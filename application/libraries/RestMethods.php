<?php

namespace Restserver\Libraries;

defined('BASEPATH') OR exit('No direct script access allowed');

abstract class RestMethods{

    const HTTP_GET = "GET";
    const HTTP_POST = "POST";
    const HTTP_PUT = "PUT";
    const HTTP_DELETE = "DELETE";
    const HTTP_PATCH = "PATCH";
}
