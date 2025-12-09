<?php

declare(strict_types=1);

namespace Telnyx\AI\Embeddings;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Retrieve tasks for the user that are either `queued`, `processing`, `failed`, `success` or `partial_success` based on the query string. Defaults to `queued` and `processing`.
 *
 * @see Telnyx\Services\AI\EmbeddingsService::list()
 *
 * @phpstan-type EmbeddingListParamsShape = array{status?: list<string>}
 */
final class EmbeddingListParams implements BaseModel
{
    /** @use SdkModel<EmbeddingListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * List of task statuses i.e. `status=queued&status=processing`.
     *
     * @var list<string>|null $status
     */
    #[Optional(list: 'string')]
    public ?array $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $status
     */
    public static function with(?array $status = null): self
    {
        $self = new self;

        null !== $status && $self['status'] = $status;

        return $self;
    }

    /**
     * List of task statuses i.e. `status=queued&status=processing`.
     *
     * @param list<string> $status
     */
    public function withStatus(array $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
