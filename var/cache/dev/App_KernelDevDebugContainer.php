<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\Container6sztt8S\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/Container6sztt8S/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/Container6sztt8S.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\Container6sztt8S\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \Container6sztt8S\App_KernelDevDebugContainer([
    'container.build_hash' => '6sztt8S',
    'container.build_id' => '88da30cd',
    'container.build_time' => 1582141818,
], __DIR__.\DIRECTORY_SEPARATOR.'Container6sztt8S');
