<?php

declare(strict_types=1);

namespace Telnyx\PublicInternetGateways;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Networks\InterfaceStatus;

/**
  * @phpstan-type interface_alias = array{
  *   name?: string, networkID?: string, status?: value-of<InterfaceStatus>
  * }
  * 
 */
final class Interface implements BaseModel
{
  /** @use SdkModel<interface_alias> */
  use SdkModel;

  /**
  * A user specified name for the interface.
  * 
  * @var string|null $name
 */
  #[Api(optional: true)]
  public ?string $name;

  /**
  * The id of the network associated with the interface.
  * 
  * @var string|null $networkID
 */
  #[Api("network_id", optional: true)]
  public ?string $networkID;

  /**
  * The current status of the interface deployment.
  * 
  * @var value-of<InterfaceStatus>|null $status
 */
  #[Api(enum: InterfaceStatus::class, optional: true)]
  public ?string $status;

  /**  */
  public function __construct(){$this->initialize();}

  /**
  * Construct an instance from the required parameters.
  * 
  * You must use named parameters to construct any parameters with a default value.
  * 
  * @param string $name
  * @param string $networkID
  * @param InterfaceStatus|value-of<InterfaceStatus> $status
  * 
  * @return self
 */
  public static function with(
    string $name = null,
    string $networkID = null,
    InterfaceStatus|string $status = null,
  ): self {
    $obj = new self;

    null !== $name && $obj->name = $name;
    null !== $networkID && $obj->networkID = $networkID;
    null !== $status && $obj->status = $status instanceof InterfaceStatus ? $status->value : $status;

    return $obj;
  }

  /**
  * A user specified name for the interface.
  * 
  * @param string $name
  * 
  * @return self
 */
  public function withName(string $name): self {
    $obj = clone $this;
    $obj->name = $name;
    return $obj;
  }

  /**
  * The id of the network associated with the interface.
  * 
  * @param string $networkID
  * 
  * @return self
 */
  public function withNetworkID(string $networkID): self {
    $obj = clone $this;
    $obj->networkID = $networkID;
    return $obj;
  }

  /**
  * The current status of the interface deployment.
  * 
  * @param InterfaceStatus|value-of<InterfaceStatus> $status
  * 
  * @return self
 */
  public function withStatus(InterfaceStatus|string $status): self {
    $obj = clone $this;
    $obj->status = $status instanceof InterfaceStatus ? $status->value : $status;
    return $obj;
  }
}