<?php

declare(strict_types=1);

namespace Telnyx\AI\Integrations;

use Telnyx\AI\Integrations\IntegrationGetResponse\Status;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type IntegrationGetResponseShape = array{
 *   id: string,
 *   available_tools: list<string>,
 *   description: string,
 *   display_name: string,
 *   logo_url: string,
 *   name: string,
 *   status: value-of<Status>,
 * }
 */
final class IntegrationGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<IntegrationGetResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public string $id;

    /** @var list<string> $available_tools */
    #[Api(list: 'string')]
    public array $available_tools;

    #[Api]
    public string $description;

    #[Api]
    public string $display_name;

    #[Api]
    public string $logo_url;

    #[Api]
    public string $name;

    /** @var value-of<Status> $status */
    #[Api(enum: Status::class)]
    public string $status;

    /**
     * `new IntegrationGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IntegrationGetResponse::with(
     *   id: ...,
     *   available_tools: ...,
     *   description: ...,
     *   display_name: ...,
     *   logo_url: ...,
     *   name: ...,
     *   status: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IntegrationGetResponse)
     *   ->withID(...)
     *   ->withAvailableTools(...)
     *   ->withDescription(...)
     *   ->withDisplayName(...)
     *   ->withLogoURL(...)
     *   ->withName(...)
     *   ->withStatus(...)
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
     * @param list<string> $available_tools
     * @param Status|value-of<Status> $status
     */
    public static function with(
        string $id,
        array $available_tools,
        string $description,
        string $display_name,
        string $logo_url,
        string $name,
        Status|string $status,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->available_tools = $available_tools;
        $obj->description = $description;
        $obj->display_name = $display_name;
        $obj->logo_url = $logo_url;
        $obj->name = $name;
        $obj['status'] = $status;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * @param list<string> $availableTools
     */
    public function withAvailableTools(array $availableTools): self
    {
        $obj = clone $this;
        $obj->available_tools = $availableTools;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    public function withDisplayName(string $displayName): self
    {
        $obj = clone $this;
        $obj->display_name = $displayName;

        return $obj;
    }

    public function withLogoURL(string $logoURL): self
    {
        $obj = clone $this;
        $obj->logo_url = $logoURL;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }
}
