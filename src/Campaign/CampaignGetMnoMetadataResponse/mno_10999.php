<?php

declare(strict_types=1);

namespace Telnyx\Campaign\CampaignGetMnoMetadataResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type Mno10999Shape = array{
 *   minMsgSamples: int,
 *   mno: string,
 *   mnoReview: bool,
 *   mnoSupport: bool,
 *   noEmbeddedLink: bool,
 *   noEmbeddedPhone: bool,
 *   qualify: bool,
 *   reqSubscriberHelp: bool,
 *   reqSubscriberOptin: bool,
 *   reqSubscriberOptout: bool,
 * }
 */
final class mno_10999 implements BaseModel
{
    /** @use SdkModel<Mno10999Shape> */
    use SdkModel;

    #[Required]
    public int $minMsgSamples;

    #[Required]
    public string $mno;

    #[Required]
    public bool $mnoReview;

    #[Required]
    public bool $mnoSupport;

    #[Required]
    public bool $noEmbeddedLink;

    #[Required]
    public bool $noEmbeddedPhone;

    #[Required]
    public bool $qualify;

    #[Required]
    public bool $reqSubscriberHelp;

    #[Required]
    public bool $reqSubscriberOptin;

    #[Required]
    public bool $reqSubscriberOptout;

    /**
     * `new mno_10999()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * mno_10999::with(
     *   minMsgSamples: ...,
     *   mno: ...,
     *   mnoReview: ...,
     *   mnoSupport: ...,
     *   noEmbeddedLink: ...,
     *   noEmbeddedPhone: ...,
     *   qualify: ...,
     *   reqSubscriberHelp: ...,
     *   reqSubscriberOptin: ...,
     *   reqSubscriberOptout: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new mno_10999)
     *   ->withMinMsgSamples(...)
     *   ->withMno(...)
     *   ->withMnoReview(...)
     *   ->withMnoSupport(...)
     *   ->withNoEmbeddedLink(...)
     *   ->withNoEmbeddedPhone(...)
     *   ->withQualify(...)
     *   ->withReqSubscriberHelp(...)
     *   ->withReqSubscriberOptin(...)
     *   ->withReqSubscriberOptout(...)
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
        int $minMsgSamples,
        string $mno,
        bool $mnoReview,
        bool $mnoSupport,
        bool $noEmbeddedLink,
        bool $noEmbeddedPhone,
        bool $qualify,
        bool $reqSubscriberHelp,
        bool $reqSubscriberOptin,
        bool $reqSubscriberOptout,
    ): self {
        $self = new self;

        $self['minMsgSamples'] = $minMsgSamples;
        $self['mno'] = $mno;
        $self['mnoReview'] = $mnoReview;
        $self['mnoSupport'] = $mnoSupport;
        $self['noEmbeddedLink'] = $noEmbeddedLink;
        $self['noEmbeddedPhone'] = $noEmbeddedPhone;
        $self['qualify'] = $qualify;
        $self['reqSubscriberHelp'] = $reqSubscriberHelp;
        $self['reqSubscriberOptin'] = $reqSubscriberOptin;
        $self['reqSubscriberOptout'] = $reqSubscriberOptout;

        return $self;
    }

    public function withMinMsgSamples(int $minMsgSamples): self
    {
        $self = clone $this;
        $self['minMsgSamples'] = $minMsgSamples;

        return $self;
    }

    public function withMno(string $mno): self
    {
        $self = clone $this;
        $self['mno'] = $mno;

        return $self;
    }

    public function withMnoReview(bool $mnoReview): self
    {
        $self = clone $this;
        $self['mnoReview'] = $mnoReview;

        return $self;
    }

    public function withMnoSupport(bool $mnoSupport): self
    {
        $self = clone $this;
        $self['mnoSupport'] = $mnoSupport;

        return $self;
    }

    public function withNoEmbeddedLink(bool $noEmbeddedLink): self
    {
        $self = clone $this;
        $self['noEmbeddedLink'] = $noEmbeddedLink;

        return $self;
    }

    public function withNoEmbeddedPhone(bool $noEmbeddedPhone): self
    {
        $self = clone $this;
        $self['noEmbeddedPhone'] = $noEmbeddedPhone;

        return $self;
    }

    public function withQualify(bool $qualify): self
    {
        $self = clone $this;
        $self['qualify'] = $qualify;

        return $self;
    }

    public function withReqSubscriberHelp(bool $reqSubscriberHelp): self
    {
        $self = clone $this;
        $self['reqSubscriberHelp'] = $reqSubscriberHelp;

        return $self;
    }

    public function withReqSubscriberOptin(bool $reqSubscriberOptin): self
    {
        $self = clone $this;
        $self['reqSubscriberOptin'] = $reqSubscriberOptin;

        return $self;
    }

    public function withReqSubscriberOptout(bool $reqSubscriberOptout): self
    {
        $self = clone $this;
        $self['reqSubscriberOptout'] = $reqSubscriberOptout;

        return $self;
    }
}
