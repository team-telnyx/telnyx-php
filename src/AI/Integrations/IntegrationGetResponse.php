<?php

declare(strict_types=1);

namespace Telnyx\AI\Integrations;

use Telnyx\AI\Integrations\IntegrationGetResponse\Status;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type IntegrationGetResponseShape = array{
 *   id: string,
 *   availableTools: list<string>,
 *   description: string,
 *   displayName: string,
 *   logoURL: string,
 *   name: string,
 *   status: value-of<Status>,
 * }
 */
final class IntegrationGetResponse implements BaseModel
{
    /** @use SdkModel<IntegrationGetResponseShape> */
    use SdkModel;

    #[Required]
    public string $id;

    /** @var list<string> $availableTools */
    #[Required('available_tools', list: 'string')]
    public array $availableTools;

    #[Required]
    public string $description;

    #[Required('display_name')]
    public string $displayName;

    #[Required('logo_url')]
    public string $logoURL;

    #[Required]
    public string $name;

    /** @var value-of<Status> $status */
    #[Required(enum: Status::class)]
    public string $status;

    /**
     * `new IntegrationGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IntegrationGetResponse::with(
     *   id: ...,
     *   availableTools: ...,
     *   description: ...,
     *   displayName: ...,
     *   logoURL: ...,
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
     * @param list<string> $availableTools
     * @param Status|value-of<Status> $status
     */
    public static function with(
        string $id,
        array $availableTools,
        string $description,
        string $displayName,
        string $logoURL,
        string $name,
        Status|string $status,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['availableTools'] = $availableTools;
        $obj['description'] = $description;
        $obj['displayName'] = $displayName;
        $obj['logoURL'] = $logoURL;
        $obj['name'] = $name;
        $obj['status'] = $status;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * @param list<string> $availableTools
     */
    public function withAvailableTools(array $availableTools): self
    {
        $obj = clone $this;
        $obj['availableTools'] = $availableTools;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }

    public function withDisplayName(string $displayName): self
    {
        $obj = clone $this;
        $obj['displayName'] = $displayName;

        return $obj;
    }

    public function withLogoURL(string $logoURL): self
    {
        $obj = clone $this;
        $obj['logoURL'] = $logoURL;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

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
