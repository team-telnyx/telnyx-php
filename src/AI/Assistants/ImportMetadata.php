<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\AI\Assistants\ImportMetadata\ImportProvider;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ImportMetadataShape = array{
 *   importID?: string|null, importProvider?: value-of<ImportProvider>|null
 * }
 */
final class ImportMetadata implements BaseModel
{
    /** @use SdkModel<ImportMetadataShape> */
    use SdkModel;

    /**
     * ID of the assistant in the provider's system.
     */
    #[Optional('import_id')]
    public ?string $importID;

    /**
     * Provider the assistant was imported from.
     *
     * @var value-of<ImportProvider>|null $importProvider
     */
    #[Optional('import_provider', enum: ImportProvider::class)]
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
        $self = new self;

        null !== $importID && $self['importID'] = $importID;
        null !== $importProvider && $self['importProvider'] = $importProvider;

        return $self;
    }

    /**
     * ID of the assistant in the provider's system.
     */
    public function withImportID(string $importID): self
    {
        $self = clone $this;
        $self['importID'] = $importID;

        return $self;
    }

    /**
     * Provider the assistant was imported from.
     *
     * @param ImportProvider|value-of<ImportProvider> $importProvider
     */
    public function withImportProvider(
        ImportProvider|string $importProvider
    ): self {
        $self = clone $this;
        $self['importProvider'] = $importProvider;

        return $self;
    }
}
