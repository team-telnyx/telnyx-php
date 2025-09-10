<?php

declare(strict_types=1);

namespace Telnyx\Campaign\CampaignGetMnoMetadataResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
  * @phpstan-type 10999_alias = array{
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
  * 
 */
final class 10999 implements BaseModel
{
  /** @use SdkModel<10999_alias> */
  use SdkModel;

  /** @var int $minMsgSamples */
  #[Api]
  public int $minMsgSamples;

  /** @var string $mno */
  #[Api]
  public string $mno;

  /** @var bool $mnoReview */
  #[Api]
  public bool $mnoReview;

  /** @var bool $mnoSupport */
  #[Api]
  public bool $mnoSupport;

  /** @var bool $noEmbeddedLink */
  #[Api]
  public bool $noEmbeddedLink;

  /** @var bool $noEmbeddedPhone */
  #[Api]
  public bool $noEmbeddedPhone;

  /** @var bool $qualify */
  #[Api]
  public bool $qualify;

  /** @var bool $reqSubscriberHelp */
  #[Api]
  public bool $reqSubscriberHelp;

  /** @var bool $reqSubscriberOptin */
  #[Api]
  public bool $reqSubscriberOptin;

  /** @var bool $reqSubscriberOptout */
  #[Api]
  public bool $reqSubscriberOptout;

  /**
  * `new 10999()` is missing required properties by the API.
  * 
  * To enforce required parameters use
  * ```
  * 10999::with(
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
  * (new 10999)
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
  public function __construct(){$this->initialize();}

  /**
  * Construct an instance from the required parameters.
  * 
  * You must use named parameters to construct any parameters with a default value.
  * 
  * @param int $minMsgSamples
  * @param string $mno
  * @param bool $mnoReview
  * @param bool $mnoSupport
  * @param bool $noEmbeddedLink
  * @param bool $noEmbeddedPhone
  * @param bool $qualify
  * @param bool $reqSubscriberHelp
  * @param bool $reqSubscriberOptin
  * @param bool $reqSubscriberOptout
  * 
  * @return self
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

  /**
  * @param int $minMsgSamples
  * 
  * @return self
 */
  public function withMinMsgSamples(int $minMsgSamples): self {
    $obj = clone $this;
    $obj->minMsgSamples = $minMsgSamples;
    return $obj;
  }

  /**
  * @param string $mno
  * 
  * @return self
 */
  public function withMno(string $mno): self {
    $obj = clone $this;
    $obj->mno = $mno;
    return $obj;
  }

  /**
  * @param bool $mnoReview
  * 
  * @return self
 */
  public function withMnoReview(bool $mnoReview): self {
    $obj = clone $this;
    $obj->mnoReview = $mnoReview;
    return $obj;
  }

  /**
  * @param bool $mnoSupport
  * 
  * @return self
 */
  public function withMnoSupport(bool $mnoSupport): self {
    $obj = clone $this;
    $obj->mnoSupport = $mnoSupport;
    return $obj;
  }

  /**
  * @param bool $noEmbeddedLink
  * 
  * @return self
 */
  public function withNoEmbeddedLink(bool $noEmbeddedLink): self {
    $obj = clone $this;
    $obj->noEmbeddedLink = $noEmbeddedLink;
    return $obj;
  }

  /**
  * @param bool $noEmbeddedPhone
  * 
  * @return self
 */
  public function withNoEmbeddedPhone(bool $noEmbeddedPhone): self {
    $obj = clone $this;
    $obj->noEmbeddedPhone = $noEmbeddedPhone;
    return $obj;
  }

  /**
  * @param bool $qualify
  * 
  * @return self
 */
  public function withQualify(bool $qualify): self {
    $obj = clone $this;
    $obj->qualify = $qualify;
    return $obj;
  }

  /**
  * @param bool $reqSubscriberHelp
  * 
  * @return self
 */
  public function withReqSubscriberHelp(bool $reqSubscriberHelp): self {
    $obj = clone $this;
    $obj->reqSubscriberHelp = $reqSubscriberHelp;
    return $obj;
  }

  /**
  * @param bool $reqSubscriberOptin
  * 
  * @return self
 */
  public function withReqSubscriberOptin(bool $reqSubscriberOptin): self {
    $obj = clone $this;
    $obj->reqSubscriberOptin = $reqSubscriberOptin;
    return $obj;
  }

  /**
  * @param bool $reqSubscriberOptout
  * 
  * @return self
 */
  public function withReqSubscriberOptout(bool $reqSubscriberOptout): self {
    $obj = clone $this;
    $obj->reqSubscriberOptout = $reqSubscriberOptout;
    return $obj;
  }
}