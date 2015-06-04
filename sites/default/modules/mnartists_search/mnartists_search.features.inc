<?php
/**
 * @file
 * mnartists_search.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function mnartists_search_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "facetapi" && $api == "facetapi_defaults") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_default_search_api_index().
 */
function mnartists_search_default_search_api_index() {
  $items = array();
  $items['default_node_index'] = entity_import('search_api_index', '{
    "name" : "Default node index",
    "machine_name" : "default_node_index",
    "description" : "An automatically created search index for indexing node data. Might be configured to specific needs.",
    "server" : "localhost",
    "item_type" : "node",
    "options" : {
      "index_directly" : 1,
      "cron_limit" : "50",
      "data_alter_callbacks" : {
        "search_api_alter_bundle_filter" : {
          "status" : 1,
          "weight" : "-10",
          "settings" : { "default" : "1", "bundles" : { "community" : "community" } }
        },
        "search_api_alter_node_access" : { "status" : 1, "weight" : "0", "settings" : [] },
        "search_api_alter_node_status" : { "status" : 1, "weight" : "0", "settings" : [] },
        "search_api_alter_add_hierarchy" : { "status" : 0, "weight" : "0", "settings" : { "fields" : [] } },
        "search_api_alter_add_viewed_entity" : { "status" : 0, "weight" : "0", "settings" : { "mode" : "full" } },
        "search_api_alter_add_url" : { "status" : 1, "weight" : "0", "settings" : [] },
        "search_api_alter_add_aggregation" : {
          "status" : 1,
          "weight" : "0",
          "settings" : { "fields" : { "search_api_aggregation_1" : {
                "name" : "All Content",
                "type" : "fulltext",
                "fields" : [
                  "title",
                  "author",
                  "field_category",
                  "field_venue",
                  "field_email",
                  "og_group_ref",
                  "field_community_user_select",
                  "og_membership",
                  "sort_by_name",
                  "field_tags",
                  "field_medium",
                  "field_dimensions",
                  "field_for_sale",
                  "field_subject_concept",
                  "field_medium3",
                  "field_roles",
                  "field_other_artists_involved",
                  "group_group",
                  "field_community_twitter",
                  "field_article_category",
                  "field_subheader",
                  "field_address",
                  "field_city",
                  "field_state",
                  "field_zip",
                  "field_contact_name",
                  "author:name",
                  "author:sort_by_name",
                  "body:value"
                ],
                "description" : "A Fulltext aggregation of the following fields: Title, Author, Event Category, Venue, Contact, Community, Community, OG memberships, Sort By Name, Tags, Category, Dimensions\\/Duration, For Sale, Subject\\/Concept, Medium or Genre, Role(s), Other Artists Involved, Group, Twitter Hashtag, Article Type, Subhead, Address, City, State, Zip, Contact Name, Author \\u00bb Name, Author \\u00bb Sort By Name, The main body text \\u00bb Text."
              }
            }
          }
        }
      },
      "processors" : {
        "search_api_case_ignore" : {
          "status" : 1,
          "weight" : "0",
          "settings" : { "fields" : {
              "title" : true,
              "field_email" : true,
              "field_dimensions" : true,
              "field_address" : true,
              "field_city" : true,
              "field_contact_name" : true,
              "body:value" : true
            }
          }
        },
        "search_api_html_filter" : {
          "status" : 1,
          "weight" : "10",
          "settings" : {
            "fields" : {
              "title" : true,
              "field_email" : true,
              "field_dimensions" : true,
              "field_address" : true,
              "field_city" : true,
              "field_contact_name" : true,
              "body:value" : true
            },
            "title" : 0,
            "alt" : 1,
            "tags" : "h1 = 5\\r\\nh2 = 3\\r\\nh3 = 2\\r\\nstrong = 2\\r\\nb = 2\\r\\nem = 1.5\\r\\nu = 1.5"
          }
        },
        "search_api_tokenizer" : {
          "status" : 1,
          "weight" : "20",
          "settings" : {
            "fields" : {
              "title" : true,
              "field_email" : true,
              "field_dimensions" : true,
              "field_address" : true,
              "field_city" : true,
              "field_contact_name" : true
            },
            "spaces" : "[^\\\\p{L}\\\\p{N}]",
            "ignorable" : "[-]"
          }
        },
        "search_api_stopwords" : {
          "status" : 0,
          "weight" : "30",
          "settings" : {
            "fields" : {
              "title" : true,
              "field_email" : true,
              "field_dimensions" : true,
              "field_address" : true,
              "field_city" : true,
              "field_contact_name" : true,
              "body:value" : true
            },
            "file" : "",
            "stopwords" : "but\\r\\ndid\\r\\nthe this that those\\r\\netc"
          }
        }
      },
      "fields" : {
        "nid" : { "type" : "integer" },
        "type" : { "type" : "string" },
        "title" : { "type" : "text", "boost" : "5.0" },
        "url" : { "type" : "uri" },
        "status" : { "type" : "integer" },
        "promote" : { "type" : "boolean" },
        "sticky" : { "type" : "boolean" },
        "created" : { "type" : "date" },
        "changed" : { "type" : "date" },
        "author" : { "type" : "integer", "entity_type" : "user" },
        "field_category" : { "type" : "integer", "entity_type" : "taxonomy_term" },
        "field_venue" : { "type" : "integer", "entity_type" : "node" },
        "field_email" : { "type" : "text" },
        "og_group_ref" : { "type" : "list\\u003Cinteger\\u003E", "entity_type" : "node" },
        "field_community_user_select" : { "type" : "list\\u003Cinteger\\u003E", "entity_type" : "node" },
        "og_membership" : { "type" : "list\\u003Cinteger\\u003E", "entity_type" : "og_membership" },
        "og_membership__1" : { "type" : "list\\u003Cinteger\\u003E", "entity_type" : "og_membership" },
        "og_group_ref__og_membership" : { "type" : "list\\u003Cinteger\\u003E", "entity_type" : "og_membership" },
        "og_group_ref__og_membership__1" : { "type" : "list\\u003Cinteger\\u003E", "entity_type" : "og_membership" },
        "near_me_latlng" : { "type" : "string", "real_type" : "location" },
        "sort_by_name" : { "type" : "string" },
        "full_name_actual" : { "type" : "string" },
        "sort_by_date" : { "type" : "date" },
        "flags_count" : { "type" : "integer" },
        "field_tags" : { "type" : "list\\u003Cinteger\\u003E", "entity_type" : "taxonomy_term" },
        "field_public" : { "type" : "boolean" },
        "field_medium" : { "type" : "list\\u003Cinteger\\u003E", "entity_type" : "taxonomy_term" },
        "field_dimensions" : { "type" : "text" },
        "field_for_sale" : { "type" : "boolean" },
        "field_subject_concept" : { "type" : "list\\u003Cinteger\\u003E", "entity_type" : "taxonomy_term" },
        "field_other_artists_involved" : { "type" : "list\\u003Cinteger\\u003E", "entity_type" : "taxonomy_term" },
        "group_group" : { "type" : "boolean" },
        "members" : { "type" : "list\\u003Cinteger\\u003E", "entity_type" : "user" },
        "members__1" : { "type" : "list\\u003Cinteger\\u003E", "entity_type" : "user" },
        "field_announce_date" : { "type" : "date" },
        "field_op_type" : { "type" : "integer", "entity_type" : "taxonomy_term" },
        "field_article_category" : { "type" : "integer", "entity_type" : "taxonomy_term" },
        "field_byline" : { "type" : "string" },
        "field_address" : { "type" : "text" },
        "field_city" : { "type" : "text" },
        "field_state" : { "type" : "string" },
        "field_zip" : { "type" : "integer" },
        "field_contact_name" : { "type" : "text" },
        "search_api_language" : { "type" : "string" },
        "search_api_aggregation_1" : { "type" : "text" },
        "search_api_url" : { "type" : "uri" },
        "author:uid" : { "type" : "integer" },
        "body:value" : { "type" : "text" },
        "field_date:value" : { "type" : "date" },
        "field_date:value2" : { "type" : "date" },
        "field_date:duration" : { "type" : "duration" }
      }
    },
    "enabled" : "1",
    "read_only" : "0",
    "rdf_mapping" : []
  }');
  $items['users'] = entity_import('search_api_index', '{
    "name" : "Users",
    "machine_name" : "users",
    "description" : null,
    "server" : "localhost",
    "item_type" : "user",
    "options" : {
      "index_directly" : 1,
      "cron_limit" : "50",
      "fields" : {
        "uid" : { "type" : "integer" },
        "name" : { "type" : "text" },
        "mail" : { "type" : "text" },
        "url" : { "type" : "uri" },
        "created" : { "type" : "date" },
        "roles" : { "type" : "list\\u003Cinteger\\u003E" },
        "status" : { "type" : "integer" },
        "picture_url" : { "type" : "uri" },
        "profile_main" : { "type" : "integer", "entity_type" : "profile2" },
        "profile_resume" : { "type" : "integer", "entity_type" : "profile2" },
        "profile_organization" : { "type" : "integer", "entity_type" : "profile2" },
        "og_user_node" : { "type" : "list\\u003Cinteger\\u003E", "entity_type" : "node" },
        "field_featured_artist" : { "type" : "boolean" },
        "field_user_global_privacy_flag" : { "type" : "boolean" },
        "og_membership" : { "type" : "list\\u003Cinteger\\u003E", "entity_type" : "og_membership" },
        "og_membership__1" : { "type" : "list\\u003Cinteger\\u003E", "entity_type" : "og_membership" },
        "og_user_node__og_membership" : { "type" : "list\\u003Cinteger\\u003E", "entity_type" : "og_membership" },
        "og_user_node__og_membership__1" : { "type" : "list\\u003Cinteger\\u003E", "entity_type" : "og_membership" },
        "near_me_latlng" : { "type" : "string", "real_type" : "location" },
        "mnartist_profile2_search" : { "type" : "list\\u003Ctext\\u003E" },
        "sort_by_name" : { "type" : "string" },
        "full_name_actual" : { "type" : "string", "boost" : "5.0" },
        "sort_by_date" : { "type" : "date" },
        "search_api_language" : { "type" : "string" },
        "search_api_url" : { "type" : "uri" },
        "search_api_aggregation_1" : { "type" : "text" },
        "search_api_aggregation_2" : { "type" : "text" },
        "profile_main:type" : { "type" : "string", "entity_type" : "profile2_type" },
        "profile_main:label" : { "type" : "text" },
        "profile_main:url" : { "type" : "uri" },
        "profile_main:user" : { "type" : "integer", "entity_type" : "user" },
        "profile_main:field_email" : { "type" : "text" },
        "profile_main:field_address" : { "type" : "text" },
        "profile_main:field_city" : { "type" : "text" },
        "profile_main:field_state" : { "type" : "string" },
        "profile_main:field_zip" : { "type" : "integer" },
        "profile_main:field_country" : { "type" : "string" },
        "profile_main:field_twitter" : { "type" : "text" },
        "profile_main:field_facebook" : { "type" : "text" },
        "profile_main:field_organization_name" : { "type" : "text" },
        "profile_main:field_organization_type" : { "type" : "integer", "entity_type" : "taxonomy_term" },
        "profile_main:field_phone" : { "type" : "text" },
        "profile_main:field_pseudonym" : { "type" : "text" },
        "profile_main:field_birthplace" : { "type" : "text" },
        "profile_main:field_birthdate" : { "type" : "date" },
        "profile_main:field_gender" : { "type" : "list\\u003Cstring\\u003E" },
        "profile_main:field_full_name" : { "type" : "integer", "entity_type" : "field_collection_item" },
        "profile_main:field_public_email" : { "type" : "text" },
        "profile_main:field_experience" : { "type" : "integer", "entity_type" : "taxonomy_term" },
        "profile_main:field_practice" : { "type" : "list\\u003Cinteger\\u003E", "entity_type" : "taxonomy_term" },
        "profile_main:field_county" : { "type" : "text" },
        "profile_main:field_education" : {
          "type" : "list\\u003Cinteger\\u003E",
          "entity_type" : "field_collection_item"
        },
        "profile_main:field_work_experience" : {
          "type" : "list\\u003Cinteger\\u003E",
          "entity_type" : "field_collection_item"
        },
        "profile_main:field_teaching_experience" : {
          "type" : "list\\u003Cinteger\\u003E",
          "entity_type" : "field_collection_item"
        },
        "profile_main:field_awards" : {
          "type" : "list\\u003Cinteger\\u003E",
          "entity_type" : "field_collection_item"
        },
        "profile_main:field_exhibition_and_performance" : {
          "type" : "list\\u003Cinteger\\u003E",
          "entity_type" : "field_collection_item"
        },
        "profile_main:field_publications" : {
          "type" : "list\\u003Cinteger\\u003E",
          "entity_type" : "field_collection_item"
        },
        "profile_main:field_galleries" : {
          "type" : "list\\u003Cinteger\\u003E",
          "entity_type" : "field_collection_item"
        },
        "profile_main:field_collections" : {
          "type" : "list\\u003Cinteger\\u003E",
          "entity_type" : "field_collection_item"
        },
        "profile_main:field_related_organizations" : {
          "type" : "list\\u003Cinteger\\u003E",
          "entity_type" : "field_collection_item"
        },
        "profile_organization:pid" : { "type" : "integer" },
        "profile_organization:type" : { "type" : "string", "entity_type" : "profile2_type" },
        "profile_organization:label" : { "type" : "text" },
        "profile_organization:created" : { "type" : "date" },
        "profile_organization:changed" : { "type" : "date" },
        "profile_organization:url" : { "type" : "uri" },
        "profile_organization:user" : { "type" : "integer", "entity_type" : "user" },
        "profile_organization:field_email" : { "type" : "text" },
        "profile_organization:field_address" : { "type" : "text" },
        "profile_organization:field_city" : { "type" : "text" },
        "profile_organization:field_state" : { "type" : "string" },
        "profile_organization:field_zip" : { "type" : "integer" },
        "profile_organization:field_country" : { "type" : "string" },
        "profile_organization:field_twitter" : { "type" : "text" },
        "profile_organization:field_facebook" : { "type" : "text" },
        "profile_organization:field_organization_name" : { "type" : "text" },
        "profile_organization:field_organization_type" : { "type" : "integer", "entity_type" : "taxonomy_term" },
        "profile_organization:field_phone" : { "type" : "text" },
        "profile_organization:field_pseudonym" : { "type" : "text" },
        "profile_organization:field_birthplace" : { "type" : "text" },
        "profile_organization:field_birthdate" : { "type" : "date" },
        "profile_organization:field_gender" : { "type" : "list\\u003Cstring\\u003E" },
        "profile_organization:field_full_name" : { "type" : "integer", "entity_type" : "field_collection_item" },
        "profile_organization:field_public_email" : { "type" : "text" },
        "profile_organization:field_experience" : { "type" : "integer", "entity_type" : "taxonomy_term" },
        "profile_organization:field_practice" : { "type" : "list\\u003Cinteger\\u003E", "entity_type" : "taxonomy_term" },
        "profile_organization:field_county" : { "type" : "text" },
        "profile_organization:field_education" : {
          "type" : "list\\u003Cinteger\\u003E",
          "entity_type" : "field_collection_item"
        },
        "profile_organization:field_work_experience" : {
          "type" : "list\\u003Cinteger\\u003E",
          "entity_type" : "field_collection_item"
        },
        "profile_organization:field_teaching_experience" : {
          "type" : "list\\u003Cinteger\\u003E",
          "entity_type" : "field_collection_item"
        },
        "profile_organization:field_awards" : {
          "type" : "list\\u003Cinteger\\u003E",
          "entity_type" : "field_collection_item"
        },
        "profile_organization:field_exhibition_and_performance" : {
          "type" : "list\\u003Cinteger\\u003E",
          "entity_type" : "field_collection_item"
        },
        "profile_organization:field_publications" : {
          "type" : "list\\u003Cinteger\\u003E",
          "entity_type" : "field_collection_item"
        },
        "profile_organization:field_galleries" : {
          "type" : "list\\u003Cinteger\\u003E",
          "entity_type" : "field_collection_item"
        },
        "profile_organization:field_collections" : {
          "type" : "list\\u003Cinteger\\u003E",
          "entity_type" : "field_collection_item"
        },
        "profile_organization:field_related_organizations" : {
          "type" : "list\\u003Cinteger\\u003E",
          "entity_type" : "field_collection_item"
        }
      },
      "data_alter_callbacks" : {
        "search_api_alter_add_hierarchy" : { "status" : 1, "weight" : "0", "settings" : { "fields" : [] } },
        "search_api_alter_add_viewed_entity" : { "status" : 0, "weight" : "0", "settings" : { "mode" : "full" } },
        "search_api_alter_add_aggregation" : {
          "status" : 1,
          "weight" : "0",
          "settings" : { "fields" : {
              "search_api_aggregation_1" : {
                "name" : "All Content",
                "type" : "fulltext",
                "fields" : [
                  "name",
                  "profile_main",
                  "profile_resume",
                  "profile_organization",
                  "og_membership"
                ],
                "description" : "A Fulltext aggregation of the following fields: Name, Main profile profile, R\\u00e9sum\\u00e9 profile, Organization profile, OG memberships."
              },
              "search_api_aggregation_2" : {
                "name" : "Full name FULLTEXT",
                "type" : "fulltext",
                "fields" : [ "name", "full_name_actual" ],
                "description" : "A Fulltext aggregation of the following fields: Name, Full Name Actual."
              }
            }
          }
        },
        "search_api_alter_add_url" : { "status" : 1, "weight" : "0", "settings" : [] }
      },
      "processors" : {
        "search_api_case_ignore" : {
          "status" : 0,
          "weight" : "0",
          "settings" : { "fields" : { "name" : true, "mail" : true } }
        },
        "search_api_html_filter" : {
          "status" : 0,
          "weight" : "10",
          "settings" : {
            "fields" : { "name" : true, "mail" : true },
            "title" : 0,
            "alt" : 1,
            "tags" : "h1 = 5\\r\\nh2 = 3\\r\\nh3 = 2\\r\\nstrong = 2\\r\\nb = 2\\r\\nem = 1.5\\r\\nu = 1.5"
          }
        },
        "search_api_tokenizer" : {
          "status" : 0,
          "weight" : "20",
          "settings" : {
            "fields" : { "name" : true, "mail" : true },
            "spaces" : "[^[:alnum:]]",
            "ignorable" : "[\\u0027]"
          }
        },
        "search_api_stopwords" : {
          "status" : 0,
          "weight" : "30",
          "settings" : {
            "fields" : { "name" : true, "mail" : true },
            "file" : "",
            "stopwords" : "but\\r\\ndid\\r\\nthe this that those\\r\\netc"
          }
        }
      }
    },
    "enabled" : "1",
    "read_only" : "0",
    "rdf_mapping" : []
  }');
  return $items;
}
