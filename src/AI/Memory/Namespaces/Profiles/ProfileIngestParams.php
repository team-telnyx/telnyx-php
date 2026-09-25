<?php

declare(strict_types=1);

namespace Telnyx\AI\Memory\Namespaces\Profiles;

use Telnyx\AI\Memory\Namespaces\Profiles\ProfileIngestParams\Body;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * Store a session. Facts are extracted from whatever you send — the body is taken as any JSON value and stored whole, so a framework's own transcript shape works unchanged. `messages` of `role`/`content` is the conventional shape, not a requirement. An empty object or a null body is refused. Carry a `session_id` to name the session: re-ingesting the same one replaces what it held. Omit it and a session is opened and returned. Extraction runs asynchronously — poll the returned operation.
 *
 * @see Telnyx\Services\AI\Memory\Namespaces\ProfilesService::ingest()
 *
 * @phpstan-import-type BodyVariants from \Telnyx\AI\Memory\Namespaces\Profiles\ProfileIngestParams\Body
 * @phpstan-import-type BodyShape from \Telnyx\AI\Memory\Namespaces\Profiles\ProfileIngestParams\Body
 *
 * @phpstan-type ProfileIngestParamsShape = array{
 *   namespace: string, body: BodyShape, sessionID?: string|null
 * }
 */
final class ProfileIngestParams implements BaseModel
{
    /** @use SdkModel<ProfileIngestParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $namespace;

    /** @var BodyVariants $body */
    #[Required(union: Body::class)]
    public string|float|bool|array $body;

    /**
     * Names the session. Re-ingesting the same session replaces what it held and keeps its `source_id`. Omit it to have one derived from the content and returned. No whitespace, control characters, or any of / \ # ? %.
     */
    #[Optional(nullable: true)]
    public ?string $sessionID;

    /**
     * `new ProfileIngestParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ProfileIngestParams::with(namespace: ..., body: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ProfileIngestParams)->withNamespace(...)->withBody(...)
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
     * @param BodyShape $body
     */
    public static function with(
        string $namespace,
        string|float|bool|array $body,
        string|Omitted|null $sessionID = Omitted::VALUE,
    ): self {
        $self = new self;

        $self['namespace'] = $namespace;
        $self['body'] = $body;

        Omitted::VALUE !== $sessionID && $self['sessionID'] = $sessionID;

        return $self;
    }

    public function withNamespace(string $namespace): self
    {
        $self = clone $this;
        $self['namespace'] = $namespace;

        return $self;
    }

    /**
     * @param BodyShape $body
     */
    public function withBody(string|float|bool|array $body): self
    {
        $self = clone $this;
        $self['body'] = $body;

        return $self;
    }

    /**
     * Names the session. Re-ingesting the same session replaces what it held and keeps its `source_id`. Omit it to have one derived from the content and returned. No whitespace, control characters, or any of / \ # ? %.
     */
    public function withSessionID(?string $sessionID): self
    {
        $self = clone $this;
        $self['sessionID'] = $sessionID;

        return $self;
    }
}
