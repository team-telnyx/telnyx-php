<?php

declare(strict_types=1);

namespace Telnyx\AI\Memory\Namespaces\Profiles\ProfileGetSummaryResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * @phpstan-type DataShape = array{
 *   isStale: bool,
 *   profileID: string,
 *   generatedAt?: string|null,
 *   text?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Whether newer memories have arrived since the summary was generated. The summary is regenerated in the background, so a true here is ordinary and the summary is still usable.
     */
    #[Required('is_stale')]
    public bool $isStale;

    #[Required('profile_id')]
    public string $profileID;

    /**
     * When the summary was last generated. Null while none is ready.
     */
    #[Optional('generated_at', nullable: true)]
    public ?string $generatedAt;

    /**
     * The precomputed summary, ready to place in an assistant's context at the start of a session.
     */
    #[Optional(nullable: true)]
    public ?string $text;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(isStale: ..., profileID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withIsStale(...)->withProfileID(...)
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
        bool $isStale,
        string $profileID,
        string|Omitted|null $generatedAt = Omitted::VALUE,
        string|Omitted|null $text = Omitted::VALUE,
    ): self {
        $self = new self;

        $self['isStale'] = $isStale;
        $self['profileID'] = $profileID;

        Omitted::VALUE !== $generatedAt && $self['generatedAt'] = $generatedAt;
        Omitted::VALUE !== $text && $self['text'] = $text;

        return $self;
    }

    /**
     * Whether newer memories have arrived since the summary was generated. The summary is regenerated in the background, so a true here is ordinary and the summary is still usable.
     */
    public function withIsStale(bool $isStale): self
    {
        $self = clone $this;
        $self['isStale'] = $isStale;

        return $self;
    }

    public function withProfileID(string $profileID): self
    {
        $self = clone $this;
        $self['profileID'] = $profileID;

        return $self;
    }

    /**
     * When the summary was last generated. Null while none is ready.
     */
    public function withGeneratedAt(?string $generatedAt): self
    {
        $self = clone $this;
        $self['generatedAt'] = $generatedAt;

        return $self;
    }

    /**
     * The precomputed summary, ready to place in an assistant's context at the start of a session.
     */
    public function withText(?string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }
}
