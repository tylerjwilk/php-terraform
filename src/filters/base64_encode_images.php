<?

/*
 * Do base64_encode on various image types
 */
$filters['base64_encode_images'] = function ($file_data)
{
    $valid_exts = array('jpg','jpeg','gif','png');
    $matches = in_array(strtolower($file_data['ext']), $valid_exts);
    if (!$matches) return false;
    $data = base64_encode($file_data['contents']);
    return $data;
};

