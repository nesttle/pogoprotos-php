<?php
// Generated by https://github.com/bramp/protoc-gen-php// Please include protocolbuffers before this file, for example:
//   require('protocolbuffers.inc.php');
//   require('POGOProtos/Networking/Responses/SetPlayerTeamResponse.proto.php');

namespace POGOProtos\Networking\Responses {

  use Protobuf;
  use ProtobufEnum;
  use ProtobufMessage;

  require('POGOProtos/Data/PlayerData.proto.php');

  // enum POGOProtos.Networking.Responses.SetPlayerTeamResponse.Status
  abstract class SetPlayerTeamResponse_Status extends ProtobufEnum {
    const UNSET = 0;
    const SUCCESS = 1;
    const TEAM_ALREADY_SET = 2;
    const FAILURE = 3;

    public static $_values = array(
      0 => "UNSET",
      1 => "SUCCESS",
      2 => "TEAM_ALREADY_SET",
      3 => "FAILURE",
    );

    public static function isValid($value) {
      return array_key_exists($value, self::$_values);
    }

    public static function toString($value) {
      checkArgument(is_int($value), 'value must be a integer');
      if (array_key_exists($value, self::$_values))
        return self::$_values[$value];
      return 'UNKNOWN';
    }
  }

  // message POGOProtos.Networking.Responses.SetPlayerTeamResponse
  final class SetPlayerTeamResponse extends ProtobufMessage {

    private $_unknown;
    private $status = SetPlayerTeamResponse_Status::UNSET; // optional .POGOProtos.Networking.Responses.SetPlayerTeamResponse.Status status = 1
    private $playerData = null; // optional .POGOProtos.Data.PlayerData player_data = 2

    public function __construct($in = null, &$limit = PHP_INT_MAX) {
      parent::__construct($in, $limit);
    }

    public function read($fp, &$limit = PHP_INT_MAX) {
      $fp = ProtobufIO::toStream($fp, $limit);
      while(!feof($fp) && $limit > 0) {
        $tag = Protobuf::read_varint($fp, $limit);
        if ($tag === false) break;
        $wire  = $tag & 0x07;
        $field = $tag >> 3;
        switch($field) {
          case 1: // optional .POGOProtos.Networking.Responses.SetPlayerTeamResponse.Status status = 1
            if($wire !== 0) {
              throw new \Exception("Incorrect wire format for field $field, expected: 0 got: $wire");
            }
            $tmp = Protobuf::read_varint($fp, $limit);
            if ($tmp === false) throw new \Exception('Protobuf::read_varint returned false');
            $this->status = $tmp;

            break;
          case 2: // optional .POGOProtos.Data.PlayerData player_data = 2
            if($wire !== 2) {
              throw new \Exception("Incorrect wire format for field $field, expected: 2 got: $wire");
            }
            $len = Protobuf::read_varint($fp, $limit);
            if ($len === false) throw new \Exception('Protobuf::read_varint returned false');
            $limit -= $len;
            $this->playerData = new \POGOProtos\Data\PlayerData($fp, $len);
            if ($len !== 0) throw new \Exception('new \POGOProtos\Data\PlayerData did not read the full length');

            break;
          default:
            $limit -= Protobuf::skip_field($fp, $wire);
        }
      }
    }

    public function write($fp) {
      if ($this->status !== SetPlayerTeamResponse_Status::UNSET) {
        fwrite($fp, "\x08", 1);
        Protobuf::write_varint($fp, $this->status);
      }
      if ($this->playerData !== null) {
        fwrite($fp, "\x12", 1);
        Protobuf::write_varint($fp, $this->playerData->size());
        $this->playerData->write($fp);
      }
    }

    public function size() {
      $size = 0;
      if ($this->status !== SetPlayerTeamResponse_Status::UNSET) {
        $size += 1 + Protobuf::size_varint($this->status);
      }
      if ($this->playerData !== null) {
        $l = $this->playerData->size();
        $size += 1 + Protobuf::size_varint($l) + $l;
      }
      return $size;
    }

    public function clearStatus() { $this->status = SetPlayerTeamResponse_Status::UNSET; }
    public function getStatus() { return $this->status;}
    public function setStatus($value) { $this->status = $value; }

    public function clearPlayerData() { $this->playerData = null; }
    public function getPlayerData() { return $this->playerData;}
    public function setPlayerData(\POGOProtos\Data\PlayerData $value) { $this->playerData = $value; }

    public function __toString() {
      return ''
           . Protobuf::toString('status', $this->status, SetPlayerTeamResponse_Status::UNSET)
           . Protobuf::toString('player_data', $this->playerData, null);
    }

    // @@protoc_insertion_point(class_scope:POGOProtos.Networking.Responses.SetPlayerTeamResponse)
  }

}