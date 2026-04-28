@php
    use App\Enums\TransactionType;
@endphp
@include('productModal')

<div class="container mt-2">
    <div class="col-md-6 mx-auto">
        <div class="card shadow-sm">
            <div class="card-body">

                <form action='' method="POST">
                    @csrf
                    @method('POST')

                    <div class="mb-3">
                        <label class="form-label" for="nom">Nom</label>
                        <input class="form-control @error('nom') is-invalid @enderror" type="text" name="nom" value="{{ old('nom', $transaction->nom) }}">
                        @error('nom')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="commentaire">Commentaire</label>
                        <input class="form-control @error('commentaire') is-invalid @enderror" type="text" name="commentaire" value="{{ old('commentaire', $transaction->commentaire) }}">
                        @error('commentaire')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="row">
                        <div class="col">
                            <div class="col-auto">
                                <label class="form-label" for="type">Type de transaction</label>
                                <select class="form-select @error('type') is-invalid @enderror" name="type">
                                    @foreach (TransactionType::cases() as $type)
                                        <option value="{{  $type->value }}" {{ old('type', $transaction->type) == $type->value ? 'selected' : '' }}>{{ $type->label() }}</option>
                                    @endforeach
                                </select>
                                @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="quantite">Quantité</label>
                                <input class="form-control @error('quantite') is-invalid @enderror" type="text" name="quantite" value="{{ old('quantite', $transaction->quantite) }}">
                                @error('quantite')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="product_name">Produit</label>

                        <div class="input-group">
                            <input type="text" name="nom_produit" id="product_name" class="form-control @error('nom_produit') is-invalid @enderror" placeholder="Aucun produit sélectionné" readonly value="{{ old('nom_produit', $transaction->nom_produit) }}">
                            <input type="hidden" name="produit_id" id="product_id" value="{{ old('produit_id', $transaction->produit_id) }}">
                            <button type="button"  class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#productModal">Choisir</button>
                            @error('nom_produit')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <button class="btn btn-primary w-100 mt-3">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</div>