import axios from "axios";

document.addEventListener('DOMContentLoaded', () => {

    const alert = (type, msg) => {
        const id = Date.now();
        document.querySelector('.pagetitle').insertAdjacentHTML('afterend', `
                <div class="alert alert-${type} alert-dismissible fade show" role="alert" id="${id}">
                    ${msg}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            `);
        setTimeout(() => {
            document.getElementById(`${id}`).remove()
        }, 3000);
        console.log(msg);
    }

    document.querySelectorAll('.remove').forEach(btn => {
        const entity = btn.id.match(/[a-z]+/)[0]
        const id = btn.id.match(/\d+/)[0];
        // btn.addEventListener('click', () => alert('danger', '1111'));
        btn.addEventListener('click', async () => {
            if (confirm('Вы действительно хотите удалить: ' + id)) {
                const result = await send(`/admin/${entity}/${id}`)
                if (result && result.success) {
                    document.querySelector(`#${entity}${id}`).remove();
                    alert('success', `ID ${id} успешно удален`);
                } else {
                    alert('danger', result);
                }
            }
        })
    });

    const send = async (url) => {
        try {
            const {data} = await axios.delete(url, {
                headers: {
                    'X-CSRF-TOKEN':
                        document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });
            return data
        } catch (e) {
            return e.response.data.error
        }
    }

    const removeImage = () => {
        const removeEl = document.getElementById('show-image');
        removeEl.insertAdjacentHTML('beforebegin', `<input type="text" hidden name="remove-image" value="${removeEl.getAttribute('rel')}">`);
        removeEl.remove();
    }
    const removeEl = document.getElementById('remove-image');
    const imageEl = document.getElementById('image');
    if (removeEl&&imageEl) {
        removeEl.addEventListener('click', removeImage);
        imageEl.addEventListener('change', removeImage);
    }


});




