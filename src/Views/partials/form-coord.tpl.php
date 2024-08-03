<form action="<?= $baseUri ?>coord" method="get">
    <div class="mb-3">
        <label for="long" class="form-label">Longitude</label>
        <input type="text" name="lon" class="form-control" id="long" aria-describedby="longitude">
    </div>
    <div class="mb-3">
        <label for="lat" class="form-label">Latitude</label>
        <input type="text" name="lat" class="form-control" id="lat">
    </div>
    <button type="submit" class="btn btn-primary">Voir les prévisions</button>
</form>