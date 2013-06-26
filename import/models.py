# This is an auto-generated Django model module.
# You'll have to do the following manually to clean this up:
#     * Rearrange models' order
#     * Make sure each model has one field with primary_key=True
# Feel free to rename the models, but don't rename db_table values or field names.
#
# Also note: You'll have to insert the output of 'django-admin.py sqlcustom [appname]'
# into your database.

from django.db import models

class TResource(models.Model):
    id = models.IntegerField(primary_key=True)
    resourcetype = models.ForeignKey(TResourcetype, db_column='resourcetype')
    active = models.BooleanField()
    featured = models.BooleanField()
    seqnbr = models.SmallIntegerField()
    owner = models.ForeignKey(TUser, db_column='owner')
    createdate = models.DateTimeField()
    modifieddate = models.DateTimeField()
    createdby = models.ForeignKey(TUser, db_column='createdby')
    modifiedby = models.ForeignKey(TUser, db_column='modifiedby')
    title = models.CharField(max_length=255)
    concurrencycol = models.IntegerField()
    class Meta:
        db_table = u't_resource'

class TResourceChild(models.Model):
    parentid = models.ForeignKey(TResource, db_column='parentid')
    childid = models.ForeignKey(TResource, db_column='childid')
    class Meta:
        db_table = u't_resource_child'

class TWork(models.Model):
    responsetext = models.TextField()
    statementtext = models.TextField()
    workurl = models.CharField(max_length=255)
    artist = models.ForeignKey(TResource, db_column='artist')
    resourceid = models.ForeignKey(TResource, db_column='resourceid')
    concurrencycol = models.IntegerField()
    class Meta:
        db_table = u't_work'

class ArtistRoleVw(models.Model):
    roleid = models.IntegerField()
    workid = models.IntegerField()
    artistid = models.IntegerField()
    class Meta:
        db_table = u'artist_role_vw'

class FiveFameImport(models.Model):
    id = models.IntegerField()
    ownerid = models.IntegerField()
    name = models.CharField(max_length=80)
    description = models.TextField()
    length = models.CharField(max_length=50)
    url = models.TextField()
    author = models.CharField(max_length=100)
    class Meta:
        db_table = u'five_fame_import'

class TAccttypeRole(models.Model):
    accttypeid = models.ForeignKey(TAccounttype, db_column='accttypeid')
    roleid = models.ForeignKey(TRole, db_column='roleid')
    class Meta:
        db_table = u't_accttype_role'

class TArticle(models.Model):
    bodytext = models.TextField()
    priorityranking = models.SmallIntegerField()
    startdate = models.DateTimeField()
    enddate = models.DateTimeField()
    subhead = models.CharField(max_length=255)
    resourceid = models.ForeignKey(TResource, db_column='resourceid')
    concurrencycol = models.IntegerField()
    class Meta:
        db_table = u't_article'

class TArtist(models.Model):
    activelocation = models.CharField(max_length=50)
    awardtext = models.TextField()
    birthdate = models.DateField()
    birthlocation = models.CharField(max_length=50)
    collectiontext = models.TextField()
    ethnicity = models.CharField(max_length=50)
    exhibitiontext = models.TextField()
    gallerytext = models.TextField()
    gender = models.CharField(max_length=1)
    pseudonym = models.CharField(max_length=50)
    qualificationtext = models.TextField()
    relatedorgtext = models.TextField()
    similarartiststext = models.TextField()
    citizenship = models.ForeignKey(TCountry, db_column='citizenship')
    resourceid = models.ForeignKey(TResource, db_column='resourceid')
    concurrencycol = models.IntegerField()
    class Meta:
        db_table = u't_artist'

class TArtistRedirect(models.Model):
    oldid = models.IntegerField()
    newid = models.IntegerField()
    class Meta:
        db_table = u't_artist_redirect'

class TAuthorFile(models.Model):
    authorid = models.ForeignKey(TAuthor, db_column='authorid')
    fileid = models.ForeignKey(TMediafile, db_column='fileid')
    class Meta:
        db_table = u't_author_file'

class TComment(models.Model):
    id = models.IntegerField(primary_key=True)
    title = models.CharField(max_length=100)
    commenttext = models.TextField()
    createdate = models.DateTimeField()
    modifieddate = models.DateTimeField()
    createdby = models.ForeignKey(TUser, db_column='createdby')
    modifiedby = models.ForeignKey(TUser, db_column='modifiedby')
    resource = models.ForeignKey(TResource, db_column='resource')
    concurrencycol = models.IntegerField()
    class Meta:
        db_table = u't_comment'

class TFeedbacksource(models.Model):
    id = models.IntegerField(primary_key=True)
    name = models.CharField(max_length=50)
    seqnbr = models.SmallIntegerField()
    class Meta:
        db_table = u't_feedbacksource'

class TContactpoint(models.Model):
    id = models.IntegerField(primary_key=True)
    visible = models.BooleanField()
    contacttype = models.IntegerField()
    resourceid = models.ForeignKey(TResource, db_column='resourceid')
    emailaddress = models.CharField(max_length=100)
    classtype = models.IntegerField()
    concurrencycol = models.IntegerField()
    number = models.CharField(max_length=20)
    lineone = models.CharField(max_length=50)
    linetwo = models.CharField(max_length=50)
    city = models.CharField(max_length=100)
    state = models.IntegerField()
    stateother = models.CharField(max_length=50)
    zipcode = models.CharField(max_length=10)
    country = models.IntegerField()
    class Meta:
        db_table = u't_contactpoint'

class TContacttype(models.Model):
    id = models.IntegerField(primary_key=True)
    name = models.CharField(max_length=50)
    seqnbr = models.SmallIntegerField()
    classtype = models.SmallIntegerField()
    class Meta:
        db_table = u't_contacttype'

class TCountry(models.Model):
    id = models.IntegerField(primary_key=True)
    name = models.CharField(max_length=50)
    code = models.CharField(max_length=2)
    seqnbr = models.SmallIntegerField()
    class Meta:
        db_table = u't_country'

class TCounty(models.Model):
    id = models.IntegerField(primary_key=True)
    name = models.CharField(max_length=50)
    seqnbr = models.SmallIntegerField()
    state = models.ForeignKey(TState, db_column='state')
    class Meta:
        db_table = u't_county'

class TCountyZipcode(models.Model):
    zipcodeid = models.ForeignKey(TZipcode, db_column='zipcodeid')
    countyid = models.ForeignKey(TCounty, db_column='countyid')
    class Meta:
        db_table = u't_county_zipcode'

class TEvent(models.Model):
    description = models.TextField()
    status = models.SmallIntegerField()
    continuous = models.BooleanField()
    credit = models.TextField()
    venueid = models.IntegerField()
    price = models.TextField()
    contactisvenue = models.BooleanField()
    contactname = models.CharField(max_length=255)
    contactphone = models.CharField(max_length=255)
    contactemail = models.CharField(max_length=255)
    contactweb = models.CharField(max_length=255)
    contactinfo = models.CharField(max_length=255)
    resourceid = models.IntegerField()
    concurrencycol = models.IntegerField()
    class Meta:
        db_table = u't_event'

class TEventreminder(models.Model):
    id = models.IntegerField(primary_key=True)
    event = models.IntegerField()
    date = models.DateTimeField()
    email = models.CharField(max_length=255)
    class Meta:
        db_table = u't_eventreminder'

class TFeedback(models.Model):
    id = models.IntegerField(primary_key=True)
    contactname = models.CharField(max_length=100)
    email = models.CharField(max_length=100)
    commenttext = models.TextField()
    responserequested = models.BooleanField()
    statuscode = models.TextField() # This field type is a guess.
    createdate = models.DateTimeField()
    modifieddate = models.DateTimeField()
    createdby = models.ForeignKey(TUser, db_column='createdby')
    modifiedby = models.ForeignKey(TUser, db_column='modifiedby')
    feedbacksource = models.ForeignKey(TFeedbacksource, db_column='feedbacksource')
    feedbacktype = models.ForeignKey(TFeedbacktype, db_column='feedbacktype')
    class Meta:
        db_table = u't_feedback'

class TFeedbacktype(models.Model):
    id = models.IntegerField(primary_key=True)
    name = models.CharField(max_length=50)
    seqnbr = models.SmallIntegerField()
    class Meta:
        db_table = u't_feedbacktype'

class TFlag(models.Model):
    id = models.IntegerField(primary_key=True)
    ipaddress = models.CharField(max_length=255)
    comment = models.TextField()
    userid = models.IntegerField()
    resourceid = models.IntegerField()
    date = models.DateTimeField()
    type = models.IntegerField()
    class Meta:
        db_table = u't_flag'

class TMediafile(models.Model):
    id = models.IntegerField(primary_key=True)
    clientpath = models.CharField(max_length=255)
    filepath = models.CharField(max_length=100)
    filename = models.CharField(max_length=50)
    title = models.CharField(max_length=100)
    description = models.CharField(max_length=255)
    seqnbr = models.SmallIntegerField()
    createdate = models.DateTimeField()
    modifieddate = models.DateTimeField()
    mimetype = models.ForeignKey(TMimetype, db_column='mimetype')
    height = models.SmallIntegerField()
    width = models.SmallIntegerField()
    classtype = models.SmallIntegerField()
    concurrencycol = models.IntegerField()
    class Meta:
        db_table = u't_mediafile'

class TFlagtype(models.Model):
    id = models.IntegerField(primary_key=True)
    name = models.CharField(max_length=255)
    description = models.TextField()
    class Meta:
        db_table = u't_flagtype'

class TInstance(models.Model):
    id = models.IntegerField(primary_key=True)
    date = models.DateTimeField()
    event = models.IntegerField()
    class Meta:
        db_table = u't_instance'

class TMimetype(models.Model):
    id = models.IntegerField(primary_key=True)
    type = models.CharField(max_length=50)
    subtype = models.CharField(max_length=50)
    suffix = models.CharField(max_length=4)
    displayinline = models.BooleanField()
    classname = models.CharField(max_length=50)
    label = models.CharField(max_length=50)
    class Meta:
        db_table = u't_mimetype'

class TOidSequence(models.Model):
    contactpoint_seq = models.IntegerField()
    contacttype_seq = models.IntegerField()
    country_seq = models.IntegerField()
    county_seq = models.IntegerField()
    region_seq = models.IntegerField()
    state_seq = models.IntegerField()
    zipcode_seq = models.IntegerField()
    accounttype_seq = models.IntegerField()
    role_seq = models.IntegerField()
    user_seq = models.IntegerField()
    feedback_seq = models.IntegerField()
    feedbacksource_seq = models.IntegerField()
    feedbacktype_seq = models.IntegerField()
    mediafile_seq = models.IntegerField()
    subscription_seq = models.IntegerField()
    resource_seq = models.IntegerField()
    resource_log_seq = models.IntegerField()
    comment_seq = models.IntegerField()
    relatedlink_seq = models.IntegerField()
    resourcetype_seq = models.IntegerField()
    theme_seq = models.IntegerField()
    mimetype_seq = models.IntegerField()
    postcard_seq = models.IntegerField()
    themeproperty_seq = models.IntegerField()
    profile_seq = models.IntegerField()
    instance_seq = models.IntegerField()
    class Meta:
        db_table = u't_oid_sequence'

class TOrganization(models.Model):
    feestext = models.TextField()
    personneltext = models.TextField()
    programtext = models.TextField()
    purposetext = models.TextField()
    resourceid = models.ForeignKey(TResource, db_column='resourceid')
    concurrencycol = models.IntegerField()
    class Meta:
        db_table = u't_organization'

class TParty(models.Model):
    postcardsokay = models.BooleanField()
    subscriptionsokay = models.BooleanField()
    opentopublic = models.BooleanField()
    contactname = models.CharField(max_length=100)
    url = models.CharField(max_length=255)
    openhours = models.CharField(max_length=255)
    publicationtext = models.TextField()
    activecounty = models.ForeignKey(TCounty, db_column='activecounty')
    theme = models.ForeignKey(TTheme, db_column='theme')
    toursokay = models.BooleanField()
    resourceid = models.ForeignKey(TResource, db_column='resourceid')
    concurrencycol = models.IntegerField()
    class Meta:
        db_table = u't_party'

class TPoolTest(models.Model):
    id = models.IntegerField()
    class Meta:
        db_table = u't_pool_test'

class TPostcard(models.Model):
    id = models.IntegerField(primary_key=True)
    code = models.CharField(max_length=100)
    fromname = models.CharField(max_length=100)
    fromemail = models.CharField(max_length=100)
    toname = models.CharField(max_length=100)
    toemail = models.CharField(max_length=255)
    message = models.TextField()
    workid = models.ForeignKey(TResource, db_column='workid')
    createdate = models.DateTimeField()
    modifieddate = models.DateTimeField()
    createdby = models.IntegerField()
    modifiedby = models.IntegerField()
    class Meta:
        db_table = u't_postcard'

class TProfile(models.Model):
    id = models.IntegerField(primary_key=True)
    concurrencycol = models.IntegerField()
    class Meta:
        db_table = u't_profile'

class TRegionCounty(models.Model):
    countyid = models.ForeignKey(TCounty, db_column='countyid')
    regionid = models.ForeignKey(TRegion, db_column='regionid')
    class Meta:
        db_table = u't_region_county'

class TRelatedlink(models.Model):
    id = models.IntegerField(primary_key=True)
    description = models.CharField(max_length=255)
    title = models.CharField(max_length=100)
    url = models.CharField(max_length=255)
    seqnbr = models.SmallIntegerField()
    owner = models.ForeignKey(TResource, db_column='owner')
    resource = models.ForeignKey(TResource, db_column='resource')
    concurrencycol = models.IntegerField()
    class Meta:
        db_table = u't_relatedlink'

class TResourceFile(models.Model):
    resourceid = models.ForeignKey(TResource, db_column='resourceid')
    fileid = models.ForeignKey(TMediafile, db_column='fileid')
    class Meta:
        db_table = u't_resource_file'

class TResourceLog(models.Model):
    id = models.IntegerField(primary_key=True)
    resourceid = models.ForeignKey(TResource, db_column='resourceid')
    viewdate = models.DateTimeField()
    class Meta:
        db_table = u't_resource_log'

class TResourcecoll(models.Model):
    description = models.CharField(max_length=255)
    icon = models.ForeignKey(TMediafile, db_column='icon')
    classtype = models.SmallIntegerField()
    resourceid = models.ForeignKey(TResource, db_column='resourceid')
    concurrencycol = models.IntegerField()
    class Meta:
        db_table = u't_resourcecoll'

class TResourcetype(models.Model):
    id = models.IntegerField(primary_key=True)
    name = models.CharField(max_length=50)
    class Meta:
        db_table = u't_resourcetype'

class TState(models.Model):
    id = models.IntegerField(primary_key=True)
    code = models.CharField(max_length=2)
    name = models.CharField(max_length=50)
    seqnbr = models.SmallIntegerField()
    class Meta:
        db_table = u't_state'

class TSubscription(models.Model):
    id = models.IntegerField(primary_key=True)
    email = models.CharField(max_length=100)
    artist = models.IntegerField()
    createdate = models.DateTimeField()
    modifieddate = models.DateTimeField()
    createdby = models.ForeignKey(TUser, db_column='createdby')
    modifiedby = models.ForeignKey(TUser, db_column='modifiedby')
    class Meta:
        db_table = u't_subscription'

class TThemeproperty(models.Model):
    id = models.IntegerField(primary_key=True)
    name = models.CharField(max_length=100)
    value = models.CharField(max_length=100)
    theme = models.ForeignKey(TTheme, db_column='theme')
    class Meta:
        db_table = u't_themeproperty'

class TTour(models.Model):
    description = models.TextField()
    keywords = models.CharField(max_length=255)
    visibility = models.SmallIntegerField()
    resourceid = models.IntegerField()
    theme = models.ForeignKey(TTheme, db_column='theme')
    concurrencycol = models.IntegerField()
    class Meta:
        db_table = u't_tour'

class TTourItem(models.Model):
    id = models.IntegerField(primary_key=True)
    featured = models.BooleanField()
    description = models.TextField()
    tourid = models.ForeignKey(TResource, db_column='tourid')
    resourceid = models.ForeignKey(TResource, db_column='resourceid')
    seqnbr = models.SmallIntegerField()
    class Meta:
        db_table = u't_tour_item'

class TUserRole(models.Model):
    userid = models.ForeignKey(TUser, db_column='userid')
    roleid = models.ForeignKey(TRole, db_column='roleid')
    class Meta:
        db_table = u't_user_role'

class TVenue(models.Model):
    public = models.BooleanField()
    url = models.CharField(max_length=255)
    hours = models.CharField(max_length=255)
    county = models.IntegerField()
    resourceid = models.IntegerField(primary_key=True)
    concurrencycol = models.IntegerField()
    class Meta:
        db_table = u't_venue'

class TZipcode(models.Model):
    id = models.IntegerField(primary_key=True)
    code = models.CharField(unique=True, max_length=10)
    cityname = models.CharField(max_length=50)
    latitude = models.FloatField()
    longitude = models.FloatField()
    class Meta:
        db_table = u't_zipcode'

class Test(models.Model):
    childid = models.IntegerField()
    parentid = models.IntegerField()
    grandparentid = models.IntegerField()
    active = models.BooleanField()
    resourcetype = models.IntegerField()
    title = models.CharField(max_length=255)
    createdate = models.DateTimeField()
    classtype = models.SmallIntegerField()
    artistid = models.IntegerField()
    class Meta:
        db_table = u'test'

class TAccounttype(models.Model):
    id = models.IntegerField(primary_key=True)
    name = models.CharField(max_length=50)
    class Meta:
        db_table = u't_accounttype'

class TRole(models.Model):
    id = models.IntegerField(primary_key=True)
    name = models.CharField(unique=True, max_length=50)
    class Meta:
        db_table = u't_role'

class TUser(models.Model):
    id = models.IntegerField(primary_key=True)
    username = models.CharField(unique=True, max_length=100)
    password = models.CharField(max_length=20)
    firstname = models.CharField(max_length=50)
    lastname = models.CharField(max_length=50)
    active = models.BooleanField()
    contactokay = models.BooleanField()
    createdate = models.DateTimeField()
    modifieddate = models.DateTimeField()
    accttype = models.ForeignKey(TAccounttype, db_column='accttype')
    profile = models.ForeignKey(TProfile, db_column='profile')
    diskusagelimit = models.IntegerField()
    concurrencycol = models.IntegerField()
    class Meta:
        db_table = u't_user'

class TAuthor(models.Model):
    id = models.IntegerField(primary_key=True)
    authorbio = models.TextField()
    authorname = models.CharField(max_length=100)
    createdate = models.DateTimeField()
    modifieddate = models.DateTimeField()
    modifiedby = models.ForeignKey(TUser, db_column='modifiedby')
    createdby = models.ForeignKey(TUser, db_column='createdby')
    owner = models.ForeignKey(TResource, db_column='owner')
    concurrencycol = models.IntegerField()
    class Meta:
        db_table = u't_author'

class TTheme(models.Model):
    id = models.IntegerField(primary_key=True)
    name = models.CharField(unique=True, max_length=50)
    label = models.CharField(max_length=50)
    class Meta:
        db_table = u't_theme'

class TRegion(models.Model):
    id = models.IntegerField(primary_key=True)
    name = models.CharField(max_length=50)
    seqnbr = models.SmallIntegerField()
    state = models.ForeignKey(TState, db_column='state')
    class Meta:
        db_table = u't_region'

