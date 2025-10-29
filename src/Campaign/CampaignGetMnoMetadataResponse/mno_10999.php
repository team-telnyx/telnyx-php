<?php

declare(strict_types=1);

namespace Telnyx\Campaign\CampaignGetMnoMetadataResponse;

use Telnyx\Core\Attributes\Api;
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

    #[Api]
    public int $minMsgSamples;

    #[Api]
    public string $mno;

    #[Api]
    public bool $mnoReview;

    #[Api]
    public bool $mnoSupport;

    #[Api]
    public bool $noEmbeddedLink;

    #[Api]
    public bool $noEmbeddedPhone;

    #[Api]
    public bool $qualify;

    #[Api]
    public bool $reqSubscriberHelp;

    #[Api]
    public bool $reqSubscriberOptin;

    #[Api]
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
        $obj = new self;

        $obj->minMsgSamples = $minMsgSamples;
        $obj->mno = $mno;
        $obj->mnoReview = $mnoReview;
        $obj->mnoSupport = $mnoSupport;
        $obj->noEmbeddedLink = $noEmbeddedLink;
        $obj->noEmbeddedPhone = $noEmbeddedPhone;
        $obj->qualify = $qualify;
        $obj->reqSubscriberHelp = $reqSubscriberHelp;
        $obj->reqSubscriberOptin = $reqSubscriberOptin;
        $obj->reqSubscriberOptout = $reqSubscriberOptout;

        return $obj;
    }

    public function withMinMsgSamples(int $minMsgSamples): self
    {
        $obj = clone $this;
        $obj->minMsgSamples = $minMsgSamples;

        return $obj;
    }

    public function withMno(string $mno): self
    {
        $obj = clone $this;
        $obj->mno = $mno;

        return $obj;
    }

    public function withMnoReview(bool $mnoReview): self
    {
        $obj = clone $this;
        $obj->mnoReview = $mnoReview;

        return $obj;
    }

    public function withMnoSupport(bool $mnoSupport): self
    {
        $obj = clone $this;
        $obj->mnoSupport = $mnoSupport;

        return $obj;
    }

    public function withNoEmbeddedLink(bool $noEmbeddedLink): self
    {
        $obj = clone $this;
        $obj->noEmbeddedLink = $noEmbeddedLink;

        return $obj;
    }

    public function withNoEmbeddedPhone(bool $noEmbeddedPhone): self
    {
        $obj = clone $this;
        $obj->noEmbeddedPhone = $noEmbeddedPhone;

        return $obj;
    }

    public function withQualify(bool $qualify): self
    {
        $obj = clone $this;
        $obj->qualify = $qualify;

        return $obj;
    }

    public function withReqSubscriberHelp(bool $reqSubscriberHelp): self
    {
        $obj = clone $this;
        $obj->reqSubscriberHelp = $reqSubscriberHelp;

        return $obj;
    }

    public function withReqSubscriberOptin(bool $reqSubscriberOptin): self
    {
        $obj = clone $this;
        $obj->reqSubscriberOptin = $reqSubscriberOptin;

        return $obj;
    }

    public function withReqSubscriberOptout(bool $reqSubscriberOptout): self
    {
        $obj = clone $this;
        $obj->reqSubscriberOptout = $reqSubscriberOptout;

        return $obj;
    }
}
