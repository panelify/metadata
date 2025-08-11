<?php

namespace Panelify\Metadata;

use Illuminate\Support\Facades\Blade;
use JobMetric\PackageCore\Exceptions\AssetFolderNotFoundException;
use JobMetric\PackageCore\Exceptions\ViewFolderNotFoundException;
use JobMetric\PackageCore\PackageCore;
use JobMetric\PackageCore\PackageCoreServiceProvider;
use Panelify\Metadata\View\Components\MetadataCard;

class PanelifyMetadataServiceProvider extends PackageCoreServiceProvider
{
    /**
     * @throws ViewFolderNotFoundException
     * @throws AssetFolderNotFoundException
     */
    public function configuration(PackageCore $package): void
    {
        $package->name('panelify-metadata')
            ->hasAsset()
            ->hasTranslation()
            ->hasView();
    }

    /**
     * After Boot Package
     *
     * @return void
     */
    public function afterBootPackage(): void
    {
        // add alias for components
        Blade::component(MetadataCard::class, 'metadata-card');
    }
}
