<?php

declare(strict_types=1);

namespace Telnyx\PronunciationDicts;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update the name and/or items of an existing pronunciation dictionary. Uses optimistic locking — if the dictionary was modified concurrently, the request returns 409 Conflict.
 *
 * @see Telnyx\Services\PronunciationDictsService::update()
 *
 * @phpstan-import-type PronunciationDictItemVariants from \Telnyx\PronunciationDicts\PronunciationDictItem
 * @phpstan-import-type PronunciationDictItemShape from \Telnyx\PronunciationDicts\PronunciationDictItem
 *
 * @phpstan-type PronunciationDictUpdateParamsShape = array{
 *   items?: list<PronunciationDictItemShape>|null, name?: string|null
 * }
 */
final class PronunciationDictUpdateParams implements BaseModel
{
    /** @use SdkModel<PronunciationDictUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Updated list of pronunciation items (alias or phoneme type).
     *
     * @var list<PronunciationDictItemVariants>|null $items
     */
    #[Optional(list: PronunciationDictItem::class)]
    public ?array $items;

    /**
     * Updated dictionary name.
     */
    #[Optional]
    public ?string $name;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<PronunciationDictItemShape>|null $items
     */
    public static function with(?array $items = null, ?string $name = null): self
    {
        $self = new self;

        null !== $items && $self['items'] = $items;
        null !== $name && $self['name'] = $name;

        return $self;
    }

    /**
     * Updated list of pronunciation items (alias or phoneme type).
     *
     * @param list<PronunciationDictItemShape> $items
     */
    public function withItems(array $items): self
    {
        $self = clone $this;
        $self['items'] = $items;

        return $self;
    }

    /**
     * Updated dictionary name.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
