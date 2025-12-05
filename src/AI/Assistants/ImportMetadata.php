<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\AI\Assistants\ImportMetadata\ImportProvider;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ImportMetadataShape = array{
 *   import_id?: string|null, import_provider?: value-of<ImportProvider>|null
 * }
 */
final class ImportMetadata implements BaseModel
{
    /** @use SdkModel<ImportMetadataShape> */
    use SdkModel;

    /**
     * ID of the assistant in the provider's system.
     */
    #[Api(optional: true)]
    public ?string $import_id;

    /**
     * Provider the assistant was imported from.
     *
     * @var value-of<ImportProvider>|null $import_provider
     */
    #[Api(enum: ImportProvider::class, optional: true)]
    public ?string $import_provider;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ImportProvider|value-of<ImportProvider> $import_provider
     */
    public static function with(
        ?string $import_id = null,
        ImportProvider|string|null $import_provider = null
    ): self {
        $obj = new self;

        null !== $import_id && $obj['import_id'] = $import_id;
        null !== $import_provider && $obj['import_provider'] = $import_provider;

        return $obj;
    }

    /**
     * ID of the assistant in the provider's system.
     */
    public function withImportID(string $importID): self
    {
        $obj = clone $this;
        $obj['import_id'] = $importID;

        return $obj;
    }

    /**
     * Provider the assistant was imported from.
     *
     * @param ImportProvider|value-of<ImportProvider> $importProvider
     */
    public function withImportProvider(
        ImportProvider|string $importProvider
    ): self {
        $obj = clone $this;
        $obj['import_provider'] = $importProvider;

        return $obj;
    }
}
