<div class="modal fade" id="productModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Choisir un produit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

        <div class="modal-body">
            <div class="row g-2 mb-3 align-items-center">
                <div class="col">
                    <input type="text" id="searchProduct" class="form-control" placeholder="Rechercher un produit...">
                </div>

                <div class="col-auto">
                    <select class="form-select" id="filter" name="filter">
                        <option value="ref">Référence</option>
                        <option selected value="nom">Nom</option>
                        <option value="categorie">Catégorie</option>
                    </select>
                </div>
            </div>

            <ul class="list-group" id="productResults">
                <!-- Résultats AJAX -->
            </ul>

        </div>
            </div>

                <div>
                <ul class="list-group" id="productResults">
                    <!-- Résultats AJAX -->
                </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('searchProduct');
    const filter = document.getElementById('filter');
    const results = document.getElementById('productResults');

    input.addEventListener('keyup', function () {
        const query = this.value;
        if (query.length < 2) {
            results.innerHTML = '';
            return;
        }
        fetch(`/products/search?q=${query}&filter=${filter.value}`)
            .then(response => response.json())
            .then(data => {
                results.innerHTML = '';
                if (data.length === 0) {
                    results.innerHTML = '<li class="list-group-item">Aucun résultat</li>';
                    return;
                }
                data.forEach(product => {
                    const li = document.createElement('li');
                    li.classList.add('list-group-item', 'list-group-item-action');
                    li.style.cursor = 'pointer';
                    li.textContent = product.nom;
                    li.addEventListener('click', function () {
                        document.getElementById('product_id').value = product.id;
                        document.getElementById('product_name').value = product.nom;

                        const modal = bootstrap.Modal.getOrCreateInstance(document.getElementById('productModal'));
                        modal.hide();
                    });
                    results.appendChild(li);
                });
            });
    });
});
</script>
@endpush