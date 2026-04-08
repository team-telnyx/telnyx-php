<?php

declare(strict_types=1);

namespace Telnyx\PronunciationDicts;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * List all pronunciation dictionaries for the authenticated organization. Results are paginated using offset-based pagination.
 *
 * @see Telnyx\Services\PronunciationDictsService::list()
 *
 * @phpstan-type PronunciationDictListParamsShape = array{
 *   pageNumber?: int|null, pageSize?: int|null
 * }
 */
final class PronunciationDictListParams implements BaseModel
{
    /** @use SdkModel<PronunciationDictListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Page number (1-based). Defaults to 1.
     */
    #[Optional]
    public ?int $pageNumber;

    /**
     * Number of results per page. Defaults to 20, maximum 250.
     */
    #[Optional]
    public ?int $pageSize;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?int $pageNumber = null,
        ?int $pageSize = null
    ): self {
        $self = new self;

        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Page number (1-based). Defaults to 1.
     */
    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    /**
     * Number of results per page. Defaults to 20, maximum 250.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }
}
