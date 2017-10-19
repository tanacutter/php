<?php

namespace App\Admin\Extensions\Tools;

use Encore\Admin\Grid\Tools\BatchAction;

class GetDistricts extends BatchAction
{
    protected $action;

    public function __construct($action = 1)
    {
        $this->action = $action;
    }

    public function script()
    {
        return <<<EOT

$('.prefecture_id').on('change', function() {

    $.ajax({
        method: 'post',
        url: '{$this->resource}/getdistrict',
        data: {
            _token:LA.token,
            districtName: $('select[name="prefecture_id"] option:selected').text(),
            action: {$this->action}
        },
        success: function (data) {
            console.log(data);
            $.pjax.reload('#pjax-container');
            toastr.success('操作成功');
        }
    });
});

EOT;

    }
}
