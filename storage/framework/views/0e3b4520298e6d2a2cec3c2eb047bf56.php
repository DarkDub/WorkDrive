<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['id', 'route', 'name', 'mensaje', 'tipo']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['id', 'route', 'name', 'mensaje', 'tipo']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<!-- Modal de Confirmación de Eliminación (Minimalista) -->
<div class="modal fade" id="confirmRestaurarModal-<?php echo e($id); ?>" tabindex="-1"
    aria-labelledby="confirmRestaurarModalLabel-<?php echo e($id); ?>" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmRestaurarModalLabel-<?php echo e($id); ?>">Confirmar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <p class="mb-2">¿Está seguro de <?php echo e(strtolower($mensaje)); ?> <?php echo e(strtolower($tipo)); ?></p>
                <p class="fw-bold"><?php echo e($name); ?> ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form action="<?php echo e($route); ?>" method="POST" class="d-inline">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <button type="submit" class="btn btn-danger"><?php echo e($mensaje); ?></button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\workdrive\WorkDrive-Sena\resources\views/components/modal-confirm-restaurar.blade.php ENDPATH**/ ?>