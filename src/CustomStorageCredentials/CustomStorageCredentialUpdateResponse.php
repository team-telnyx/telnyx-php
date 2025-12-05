<?php

declare(strict_types=1);

namespace Telnyx\CustomStorageCredentials;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\CustomStorageCredentials\CustomStorageConfiguration\Backend;
use Telnyx\CustomStorageCredentials\CustomStorageCredentialUpdateResponse\RecordType;

/**
 * @phpstan-type CustomStorageCredentialUpdateResponseShape = array{
 *   connection_id: string,
 *   data: CustomStorageConfiguration,
 *   record_type: value-of<RecordType>,
 * }
 */
final class CustomStorageCredentialUpdateResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<CustomStorageCredentialUpdateResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * Uniquely identifies a Telnyx application (Call Control, TeXML) or Sip connection resource.
     */
    #[Api]
    public string $connection_id;

    #[Api]
    public CustomStorageConfiguration $data;

    /**
     * Identifies record type.
     *
     * @var value-of<RecordType> $record_type
     */
    #[Api(enum: RecordType::class)]
    public string $record_type;

    /**
     * `new CustomStorageCredentialUpdateResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CustomStorageCredentialUpdateResponse::with(
     *   connection_id: ..., data: ..., record_type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CustomStorageCredentialUpdateResponse)
     *   ->withConnectionID(...)
     *   ->withData(...)
     *   ->withRecordType(...)
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
     * @param CustomStorageConfiguration|array{
     *   backend: value-of<Backend>,
     *   configuration: GcsConfigurationData|S3ConfigurationData|AzureConfigurationData,
     * } $data
     * @param RecordType|value-of<RecordType> $record_type
     */
    public static function with(
        string $connection_id,
        CustomStorageConfiguration|array $data,
        RecordType|string $record_type,
    ): self {
        $obj = new self;

        $obj['connection_id'] = $connection_id;
        $obj['data'] = $data;
        $obj['record_type'] = $record_type;

        return $obj;
    }

    /**
     * Uniquely identifies a Telnyx application (Call Control, TeXML) or Sip connection resource.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj['connection_id'] = $connectionID;

        return $obj;
    }

    /**
     * @param CustomStorageConfiguration|array{
     *   backend: value-of<Backend>,
     *   configuration: GcsConfigurationData|S3ConfigurationData|AzureConfigurationData,
     * } $data
     */
    public function withData(CustomStorageConfiguration|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * Identifies record type.
     *
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }
}
