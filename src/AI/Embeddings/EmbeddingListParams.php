<?php

declare(strict_types=1);

namespace Telnyx\AI\Embeddings;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new EmbeddingListParams); // set properties as needed
 * $client->ai.embeddings->list(...$params->toArray());
 * ```
 * Retrieve tasks for the user that are either `queued`, `processing`, `failed`, `success` or `partial_success` based on the query string. Defaults to `queued` and `processing`.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->ai.embeddings->list(...$params->toArray());`
 *
 * @see Telnyx\AI\Embeddings->list
 *
 * @phpstan-type embedding_list_params = array{status?: list<string>}
 */
final class EmbeddingListParams implements BaseModel
{
    /** @use SdkModel<embedding_list_params> */
    use SdkModel;
    use SdkParams;

    /**
     * List of task statuses i.e. `status=queued&status=processing`.
     *
     * @var list<string>|null $status
     */
    #[Api(list: 'string', optional: true)]
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
        $obj = new self;

        null !== $status && $obj->status = $status;

        return $obj;
    }

    /**
     * List of task statuses i.e. `status=queued&status=processing`.
     *
     * @param list<string> $status
     */
    public function withStatus(array $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }
}
