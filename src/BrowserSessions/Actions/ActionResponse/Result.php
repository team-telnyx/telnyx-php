<?php

declare(strict_types=1);

namespace Telnyx\BrowserSessions\Actions\ActionResponse;

use Telnyx\BrowserSessions\Actions\ActionResponse\Result\Artifact;
use Telnyx\BrowserSessions\Actions\ActionResponse\Result\Observation;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ArtifactShape from \Telnyx\BrowserSessions\Actions\ActionResponse\Result\Artifact
 * @phpstan-import-type ObservationShape from \Telnyx\BrowserSessions\Actions\ActionResponse\Result\Observation
 *
 * @phpstan-type ResultShape = array{
 *   artifact?: null|Artifact|ArtifactShape,
 *   observation?: null|Observation|ObservationShape,
 *   results?: list<mixed>|null,
 *   title?: string|null,
 *   url?: string|null,
 * }
 */
final class Result implements BaseModel
{
    /** @use SdkModel<ResultShape> */
    use SdkModel;

    #[Optional]
    public ?Artifact $artifact;

    /**
     * Full tree and refs are delivered only in the original successful POST response when completed within wait_seconds. GET polling and idempotent replays return metadata with an empty tree and refs plus ref_count. Submit a fresh observe action to obtain usable refs.
     */
    #[Optional]
    public ?Observation $observation;

    /**
     * Present only for batch actions.
     *
     * @var list<mixed>|null $results
     */
    #[Optional(list: 'mixed')]
    public ?array $results;

    #[Optional]
    public ?string $title;

    #[Optional]
    public ?string $url;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Artifact|ArtifactShape|null $artifact
     * @param Observation|ObservationShape|null $observation
     * @param list<mixed>|null $results
     */
    public static function with(
        Artifact|array|null $artifact = null,
        Observation|array|null $observation = null,
        ?array $results = null,
        ?string $title = null,
        ?string $url = null,
    ): self {
        $self = new self;

        null !== $artifact && $self['artifact'] = $artifact;
        null !== $observation && $self['observation'] = $observation;
        null !== $results && $self['results'] = $results;
        null !== $title && $self['title'] = $title;
        null !== $url && $self['url'] = $url;

        return $self;
    }

    /**
     * @param Artifact|ArtifactShape $artifact
     */
    public function withArtifact(Artifact|array $artifact): self
    {
        $self = clone $this;
        $self['artifact'] = $artifact;

        return $self;
    }

    /**
     * Full tree and refs are delivered only in the original successful POST response when completed within wait_seconds. GET polling and idempotent replays return metadata with an empty tree and refs plus ref_count. Submit a fresh observe action to obtain usable refs.
     *
     * @param Observation|ObservationShape $observation
     */
    public function withObservation(Observation|array $observation): self
    {
        $self = clone $this;
        $self['observation'] = $observation;

        return $self;
    }

    /**
     * Present only for batch actions.
     *
     * @param list<mixed> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    public function withTitle(string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }

    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
