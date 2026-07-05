const file = document.querySelector('#file').files[0];

const presign = await fetch('/sermons/presign', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': csrf
    },
    body: JSON.stringify({
        filename: file.name,
        year,
        month
    })
});

const data = await presign.json();



await fetch(data.url, {
    method: 'PUT',
    body: file,
    headers: {
        'Content-Type': file.type
    }
});