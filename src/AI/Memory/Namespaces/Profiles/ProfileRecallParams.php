<?php

declare(strict_types=1);

namespace Telnyx\AI\Memory\Namespaces\Profiles;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * Ranked memories for a question. Matching runs over the profile's memories and returns them in rank order with a relevance `score`; the score is null where the deployment's reranker is a passthrough, in which case order is the only signal. No model runs in this path — recall returns facts, it does not compose an answer.
 *
 * @see Telnyx\Services\AI\Memory\Namespaces\ProfilesService::recall()
 *
 * @phpstan-type ProfileRecallParamsShape = array{
 *   namespace: string, query: string, topK?: int|null
 * }
 */
final class ProfileRecallParams implements BaseModel
{
    /** @use SdkModel<ProfileRecallParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $namespace;

    #[Required]
    public string $query;

    #[Optional('top_k', nullable: true)]
    public ?int $topK;

    /**
     * `new ProfileRecallParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ProfileRecallParams::with(namespace: ..., query: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ProfileRecallParams)->withNamespace(...)->withQuery(...)
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
     */
    public static function with(
        string $namespace,
        string $query,
        int|Omitted|null $topK = Omitted::VALUE
    ): self {
        $self = new self;

        $self['namespace'] = $namespace;
        $self['query'] = $query;

        Omitted::VALUE !== $topK && $self['topK'] = $topK;

        return $self;
    }

    public function withNamespace(string $namespace): self
    {
        $self = clone $this;
        $self['namespace'] = $namespace;

        return $self;
    }

    public function withQuery(string $query): self
    {
        $self = clone $this;
        $self['query'] = $query;

        return $self;
    }

    public function withTopK(?int $topK): self
    {
        $self = clone $this;
        $self['topK'] = $topK;

        return $self;
    }
}
