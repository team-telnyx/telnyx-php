<?php

declare(strict_types=1);

namespace Telnyx\AI\Clusters\RecursiveCluster;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type node_alias = array{filename: string, text: string}
 */
final class Node implements BaseModel
{
    /** @use SdkModel<node_alias> */
    use SdkModel;

    /**
     * The corresponding source file of your embedded storage bucket that the node is from.
     */
    #[Api]
    public string $filename;

    /**
     * The text of the node.
     */
    #[Api]
    public string $text;

    /**
     * `new Node()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Node::with(filename: ..., text: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Node)->withFilename(...)->withText(...)
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
    public static function with(string $filename, string $text): self
    {
        $obj = new self;

        $obj->filename = $filename;
        $obj->text = $text;

        return $obj;
    }

    /**
     * The corresponding source file of your embedded storage bucket that the node is from.
     */
    public function withFilename(string $filename): self
    {
        $obj = clone $this;
        $obj->filename = $filename;

        return $obj;
    }

    /**
     * The text of the node.
     */
    public function withText(string $text): self
    {
        $obj = clone $this;
        $obj->text = $text;

        return $obj;
    }
}
