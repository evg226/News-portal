import axios from "axios";

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.remove').forEach(btn => {
        const entity = btn.id.match(/[a-z]+/)[0]
        const id = btn.id.match(/\d+/)[0];
        btn.addEventListener('click', async () => {
            if (confirm('Вы действительно хотите удалить: ' + id)) {
                const result = await send(`/admin/${entity}/${id}`)
                if (result && result.success) {
                    document.querySelector(`#${entity}${id}`).remove();
                    console.log(`${id} успешно удален`);
                } else {
                    console.log("Ошибка удаления: " + result.error)
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
            return ({error: e.message})
        }

    }
});




