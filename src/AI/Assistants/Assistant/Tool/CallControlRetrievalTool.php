<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Assistant\Tool;

use Telnyx\AI\Assistants\Assistant\Tool\CallControlRetrievalTool\Retrieval;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type RetrievalShape from \Telnyx\AI\Assistants\Assistant\Tool\CallControlRetrievalTool\Retrieval
 *
 * @phpstan-type CallControlRetrievalToolShape = array{
 *   retrieval: Retrieval|RetrievalShape, type: 'retrieval'
 * }
 */
final class CallControlRetrievalTool implements BaseModel
{
    /** @use SdkModel<CallControlRetrievalToolShape> */
    use SdkModel;

    /** @var 'retrieval' $type */
    #[Required]
    public string $type = 'retrieval';

    #[Required]
    public Retrieval $retrieval;

    /**
     * `new CallControlRetrievalTool()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CallControlRetrievalTool::with(retrieval: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CallControlRetrievalTool)->withRetrieval(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Retrieval|RetrievalShape $retrieval
     */
    public static function with(Retrieval|array $retrieval): self
    {
        $self = new self;

        $self['retrieval'] = $retrieval;

        return $self;
    }

    /**
     * @param Retrieval|RetrievalShape $retrieval
     */
    public function withRetrieval(Retrieval|array $retrieval): self
    {
        $self = clone $this;
        $self['retrieval'] = $retrieval;

        return $self;
    }
}
