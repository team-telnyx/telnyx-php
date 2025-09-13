<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\AI\Assistants\ImportMetadata\ImportProvider;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type import_metadata = array{
 *   importID?: string, importProvider?: value-of<ImportProvider>
 * }
 */
final class ImportMetadata implements BaseModel
{
    /** @use SdkModel<import_metadata> */
    use SdkModel;

    /**
     * ID of the assistant in the provider's system.
     */
    #[Api('import_id', optional: true)]
    public ?string $importID;

    /**
     * Provider the assistant was imported from.
     *
     * @var value-of<ImportProvider>|null $importProvider
     */
    #[Api('import_provider', enum: ImportProvider::class, optional: true)]
    public ?string $importProvider;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ImportProvider|value-of<ImportProvider> $importProvider
     */
    public static function with(
        ?string $importID = null,
        ImportProvider|string|null $importProvider = null
    ): self {
        $obj = new self;

        null !== $importID && $obj->importID = $importID;
        null !== $importProvider && $obj->importProvider = $importProvider instanceof ImportProvider ? $importProvider->value : $importProvider;

        return $obj;
    }

    /**
     * ID of the assistant in the provider's system.
     */
    public function withImportID(string $importID): self
    {
        $obj = clone $this;
        $obj->importID = $importID;

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
        $obj->importProvider = $importProvider instanceof ImportProvider ? $importProvider->value : $importProvider;

        return $obj;
    }
}
