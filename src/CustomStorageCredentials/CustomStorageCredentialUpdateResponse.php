<?php

declare(strict_types=1);

namespace Telnyx\CustomStorageCredentials;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CustomStorageCredentials\CustomStorageConfiguration\Backend;
use Telnyx\CustomStorageCredentials\CustomStorageCredentialUpdateResponse\RecordType;

/**
 * @phpstan-type CustomStorageCredentialUpdateResponseShape = array{
 *   connectionID: string,
 *   data: CustomStorageConfiguration,
 *   recordType: value-of<RecordType>,
 * }
 */
final class CustomStorageCredentialUpdateResponse implements BaseModel
{
    /** @use SdkModel<CustomStorageCredentialUpdateResponseShape> */
    use SdkModel;

    /**
     * Uniquely identifies a Telnyx application (Call Control, TeXML) or Sip connection resource.
     */
    #[Required('connection_id')]
    public string $connectionID;

    #[Required]
    public CustomStorageConfiguration $data;

    /**
     * Identifies record type.
     *
     * @var value-of<RecordType> $recordType
     */
    #[Required('record_type', enum: RecordType::class)]
    public string $recordType;

    /**
     * `new CustomStorageCredentialUpdateResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CustomStorageCredentialUpdateResponse::with(
     *   connectionID: ..., data: ..., recordType: ...
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
     * @param RecordType|value-of<RecordType> $recordType
     */
    public static function with(
        string $connectionID,
        CustomStorageConfiguration|array $data,
        RecordType|string $recordType,
    ): self {
        $self = new self;

        $self['connectionID'] = $connectionID;
        $self['data'] = $data;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Uniquely identifies a Telnyx application (Call Control, TeXML) or Sip connection resource.
     */
    public function withConnectionID(string $connectionID): self
    {
        $self = clone $this;
        $self['connectionID'] = $connectionID;

        return $self;
    }

    /**
     * @param CustomStorageConfiguration|array{
     *   backend: value-of<Backend>,
     *   configuration: GcsConfigurationData|S3ConfigurationData|AzureConfigurationData,
     * } $data
     */
    public function withData(CustomStorageConfiguration|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * Identifies record type.
     *
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }
}
