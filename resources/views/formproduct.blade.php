<div class="container mt-2">
    <div class="col-md-6 mx-auto">
        <div class="card shadow-sm">
            <div class="card-body">

                <form action='' method="POST">
                    @csrf
                    @method($product->id ? "PATCH" : "POST")

                    <div class="mb-3">
                        <label class="form-label" for="ref">Référence</label>
                        <input class="form-control @error('ref') is-invalid @enderror" type="text" name="ref" value="{{ old('ref', $product->ref) }}">
                        @error('ref')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="nom">Nom</label>
                        <input class="form-control @error('nom') is-invalid @enderror" type="text" name="nom" value="{{ old('nom', $product->nom) }}">
                        @error('nom')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="categorie">Catégorie</label>
                        <input class="form-control @error('categorie') is-invalid @enderror" type="text" name="categorie" value="{{ old('categorie', $product->categorie) }}">
                        @error('categorie')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="prix">Prix</label>
                        <div class="input-group">
                            <input class="form-control @error('prix') is-invalid @enderror" type="text" name="prix" value="{{ old('prix', $product->prix) }}">
                            <span class="input-group-text">€</span>

                            @error('prix')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="quantite">Quantité</label>
                                @if($product->id)
                                    <div class="input-group">
                                @endif
                                <input class="form-control @error('quantite') is-invalid @enderror @if($product->id) text-muted @endif"
                                type="text" name="quantite" value="{{ old('quantite', $product->quantite) }}" @if($product->id) readonly @endif>
                                @if($product->id)
                                    <i class="input-group-text bi bi-info-circle" data-bs-toggle="tooltip" title="Interdiction de modifier la quantité" style="cursor: pointer;"></i>
                                    </div>
                                @endif

                                @error('quantite')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="quantite_critique">Quantité critique</label>
                                <input class="form-control @error('quantite_critique') is-invalid @enderror" type="text" name="quantite_critique" value="{{ old('quantite_critique', $product->quantite_critique) }}">
                                @error('quantite_critique')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary w-100 mt-3">
                        @if ($product->id)
                            Modifier
                        @else
                            Ajouter
                        @endif
                    </button>

                </form>
            </div>
        </div>
    </div>
</div>