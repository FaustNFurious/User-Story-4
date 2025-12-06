<footer class="bg-body-secondary mt-auto">

    <div class="container-fluid mx-auto py-3">

        <p class="text-center text-muted mb-0">&copy; {{ date('Y') }} UserStory. Tutti i diritti riservati.</p>
        <p class="text-center text-muted mb-0">Powered by UserStory</p>

        <div class="col-12 text-center mx-auto mt-4">
            <h6>Vuoi diventare revisore?</h6>
            <p>Cliccando sul pulsante sottostante, invierai una richiesta per diventare revisore.</p>
            <a href="{{ route('revisor.request') }}" class="btn btn-success btn-sm">Diventa Revisore</a>
        </div>

    </div>
    
</footer>