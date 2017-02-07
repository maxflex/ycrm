<script>
    angular.module('Yachts')
        .value('YachtsUploadDir', {!! json_encode(\App\Models\Yacht::UPLOAD_DIR) !!})
</script>
