FilePond.parse(document.body);
FilePond.registerPlugin(FilePondPluginFileValidateType);
let apk = FilePond.create(
    document.getElementById('game_zip'), {
    labelIdle: 'Upload your game\'s apk',
});
apk.setOptions({
    server: {
        url: 'upload_apk',
        process: {
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        },
        fetch: null,
        revert: null
    }
});


let thumbnail = FilePond.create(
    document.getElementById('thumbnail'), {
    labelIdle: 'Upload your game\'s thumbnail',
});

thumbnail.setOptions({
    server: {
        url: 'upload_thumbnail',
        process: {
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        },
        fetch: null,
        revert: null
    }
});