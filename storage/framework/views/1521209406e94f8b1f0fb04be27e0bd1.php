<?php
    $avatar = Auth::user()->registro->avatar;
    $avatarPath = $avatar ? asset('storage/' . $avatar) : null;
?>

<img src="<?php echo e($avatarPath); ?>" <?php echo e($attributes->merge(['class' => ''])); ?> alt="Avatar del usuario">

<?php /**PATH C:\xampp\htdocs\workdrive\WorkDrive-Sena\resources\views/components/avatar.blade.php ENDPATH**/ ?>